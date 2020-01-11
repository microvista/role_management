<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('actions')->insert([[
            'name' => 'Add',
            'description' => 'Can add to system',
            'is_enabled' => 1,
            'is_under_maintenance' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Edit',
            'description' => 'Can edit in system',
            'is_enabled' => 1,
            'is_under_maintenance' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    	[
            'name' => 'Delete',
            'description' => 'Can delete in system',
            'is_enabled' => 1,
            'is_under_maintenance' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    	[
            'name' => 'Read',
            'description' => 'can read in system',
            'is_enabled' => 1,
            'is_under_maintenance' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]]);
    }
}
