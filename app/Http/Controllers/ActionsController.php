<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

use App\Actions;

class ActionsController extends Controller
{
    public function __construct() {
		$this->Actions = new Actions();
   	}

   	/*
   		Developer: David F
   		Created Date: 11-01-2020
   		Description: This method will help to load page with all needed information
   	*/
    public function index() {

    	// Get all roles from roles table
    	$allActions = $this->Actions->all();

    	// Generate View for Roles
    	return View::make("actions/action")->with('actions',$allActions);
   	}
}
