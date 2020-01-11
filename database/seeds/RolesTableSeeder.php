<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([[
            'name' => 'Super Admin',
            'description' => 'Super Admin have full access to system',
            'is_enabled' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Admin',
            'description' => 'Admin have full access to specific department in system',
            'is_enabled' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    	[
            'name' => 'Supervisor',
            'description' => 'Supervisor have limited access in system',
            'is_enabled' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    	[
            'name' => 'Editor',
            'description' => 'Editor have edit access in system',
            'is_enabled' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]]);
    }
}
