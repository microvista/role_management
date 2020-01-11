<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use View;

use App\Roles;
use App\Actions;
use App\Permits;

class RolesController  extends Controller
{

	public function __construct() {
		$this->Roles = new Roles();
   	}

   	/*
   		Developer: David F
   		Created Date: 11-01-2020
   		Description: This method will help to load page with all needed information
   	*/
    public function index() {

    	// Get all roles from roles table
    	$allRoles = $this->Roles->all();

    	// Generate View for Roles
    	return View::make("roles/index")->with('roles',$allRoles);
   	}

   	/*
   		Developer: David F
   		Created Date: 11-01-2020
   		Description: Load Add Role Page
   	*/
   	public function create() {

   		// Get all actions to create dropdown in Add Role Form
   		$allActions = Actions::all();

   		// Load Add Role Page
    	return View::make("roles/add")->with('actions',$allActions);
   	}

   	/*
   		Developer: David F
   		Created Date: 11-01-2020
   		Description: Store Role along with actions
   	*/
   	public function store(Request $request) {

   		// Validate Request
   		$validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|max:255',
            'description' => 'required',
            'actions' => 'required|array'
        ]);

        if ($validator->fails()) {
            return redirect('roles/add')->withErrors($validator)->withInput();
        }

        // Create New Role
        $this->Roles->name = $request->name;
        $this->Roles->description = $request->description;
        $this->Roles->is_enabled = (isset($request->is_enabled) && $request->is_enabled == 'on') ? 1 : 0;
        $this->Roles->save();

        // Create relation of actions with Role
        $actions = array();
        if($this->Roles->id > 0){
        	foreach ($request->actions as $actionKey => $action) {
	        	
	        	$actions[] = [
			        'role_id' => $this->Roles->id,
			        'action_id' => $action
			    ];
	        }

	        // Insert to DB
	        Permits::insert($actions);
        }
        return redirect('roles');
   	}

   	public function edit($id) {
   		if($id > 0){

   			// Get Role Details to prefill
   			$roleDetails = $this->Roles->find($id);

   			// Get Role Actions to prefill
   			$roleActions = Permits::select('action_id')->where('role_id',$id)->get()->toArray();
   			$roleOfActions = array();
   			if(!empty($roleActions)){
   				foreach ($roleActions as $roleKey => $action) {
   					$roleOfActions[] = $action['action_id'];
   				}
   			}

   			// Get all actions to create dropdown in Add Role Form
   			$allActions = Actions::all();

			// Load Add Role Page
    		return View::make("roles/edit")->with('role_detail',$roleDetails)->with('actions',$allActions)->with('role_actions',$roleOfActions);
   		}else{
   			return redirect('roles');
   		}
   	}
   	public function update(Request $request, $id) {

   		// Validate Request
   		$validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'actions' => 'required|array'
        ]);

        if ($validator->fails()) {
            return redirect('roles/add')->withErrors($validator)->withInput();
        }

        // Find Role
        $role = $this->Roles->find($id);

        // Update New Role
        if($id){
	        $role->name = $request->name;
	        $role->description = $request->description;
	        $role->is_enabled = (isset($request->is_enabled) && $request->is_enabled == 'on') ? 1 : 0;
	        $role->save();

	        // Create relation of actions with Role
	        $actions = array();
	        if($id > 0){

	        	// First Delete OLD Actions of Role
	        	Permits::where('role_id',$id)->delete();

	        	foreach ($request->actions as $actionKey => $action) {
		        	
		        	$actions[] = [
				        'role_id' => $id,
				        'action_id' => $action
				    ];
		        }

		        // Insert to DB
		        Permits::insert($actions);
	        }
        }
        return redirect('roles');
   	}
   	public function destroy($id) {
   		if($id > 0){

   			// First delete all actions of this role from permits table
   			Permits::where('role_id', '=', $id)->delete();

   			// Delete Role
   			$this->Roles::where('id','=',$id)->delete();
   		}

   		return redirect('roles');
   	}
}