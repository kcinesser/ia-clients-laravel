<?php

use Illuminate\Database\Seeder;

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([
        	'client_id' => 1,
        	'name' => 'Spikes BBG',
        	'technology' => 0,
        	'status' => 1,
            'host_id' => 1,
            'update_instructions' => 'Test instructions.'
        ]);

        DB::table('sites')->insert([
        	'client_id' => 1,
        	'name' => 'Spikes BBG Staging',
        	'technology' => 0,
        	'status' => 2,
            'host_id' => 1,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 2,
        	'name' => 'Lincoln Berean',
        	'technology' => 0,
        	'status' => 1,
            'host_id' => 1,
            'update_instructions' => 'Test instructions.'
        ]);

        DB::table('sites')->insert([
        	'client_id' => 2,
        	'name' => 'Lincoln Berean Staging',
        	'technology' => 0,
        	'status' => 2,
            'host_id' => 1,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 3,
        	'name' => 'SL Green',
        	'technology' => 1,
        	'status' => 1,
            'host_id' => 3,

        ]);

        DB::table('sites')->insert([
        	'client_id' => 3,
        	'name' => 'One Vanderbilt',
        	'technology' => 1,
        	'status' => 1,
            'host_id' => 3,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 3,
        	'name' => '461 Fifth Ave',
        	'technology' => 1,
        	'status' => 1,
            'host_id' => 3,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 3,
        	'name' => 'SLG Sustainability',
        	'technology' => 0,
        	'status' => 0,
            'host_id' => 1,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 4,
        	'name' => 'LRS Healthcare',
        	'technology' => 0,
        	'status' => 4,
            'host_id' => 4,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 4,
        	'name' => 'LRS Healthcare Staging',
        	'technology' => 0,
        	'status' => 4,
            'host_id' => 1,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 4,
        	'name' => 'Travcon Takeover',
        	'technology' => 0,
        	'status' => 4,
            'host_id' => 1,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 5,
        	'name' => 'NU Foundation Development',
        	'technology' => 0,
        	'status' => 4,
            'host_id' => 5,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 6,
        	'name' => 'Firespring Blog',
        	'technology' => 0,
        	'status' => 1,
            'host_id' => 1,
            'update_instructions' => 'Test instructions.'
        ]);

        DB::table('sites')->insert([
        	'client_id' => 6,
        	'name' => 'Firespring Blog Staging',
        	'technology' => 0,
        	'status' => 2,
            'host_id' => 1,
        ]);


        DB::table('sites')->insert([
        	'client_id' => 7,
        	'name' => 'Interactive Client DB',
        	'technology' => 2,
        	'status' => 0,
            'host_id' => 6,
        ]);

    }
}
