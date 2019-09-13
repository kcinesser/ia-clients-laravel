<?php

use App\Enums\SiteStatus;
use App\Enums\Technologies;
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
        	'technology' => Technologies::WordPress,
        	'status' => SiteStatus::Live,
            'host_id' => 1,
            'update_instructions' => 'Test instructions.'
        ]);

        DB::table('sites')->insert([
        	'client_id' => 2,
        	'name' => 'Lincoln Berean',
        	'technology' => Technologies::WordPress,
        	'status' => SiteStatus::Live,
            'host_id' => 1,
            'update_instructions' => 'Test instructions.'
        ]);

        DB::table('sites')->insert([
        	'client_id' => 3,
        	'name' => 'SL Green',
        	'technology' => Technologies::RubyOnRails,
        	'status' => SiteStatus::Live,
            'host_id' => 3,

        ]);

        DB::table('sites')->insert([
        	'client_id' => 3,
        	'name' => 'One Vanderbilt',
        	'technology' => Technologies::RubyOnRails,
        	'status' => SiteStatus::Live,
            'host_id' => 3,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 3,
        	'name' => '461 Fifth Ave',
        	'technology' => Technologies::RubyOnRails,
        	'status' => SiteStatus::Live,
            'host_id' => 3,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 3,
        	'name' => 'SLG Sustainability',
        	'technology' => Technologies::WordPress,
        	'status' => SiteStatus::InDevelopment,
            'host_id' => 1,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 4,
        	'name' => 'LRS Healthcare',
        	'technology' => Technologies::WordPress,
        	'status' => SiteStatus::Archived,
            'host_id' => 4,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 4,
        	'name' => 'Travcon Takeover',
        	'technology' => Technologies::WordPress,
        	'status' => SiteStatus::Archived,
            'host_id' => 1,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 5,
        	'name' => 'NU Foundation Development',
        	'technology' => Technologies::WordPress,
        	'status' => SiteStatus::Archived,
            'host_id' => 5,
        ]);

        DB::table('sites')->insert([
        	'client_id' => 6,
        	'name' => 'Firespring Blog',
        	'technology' => Technologies::WordPress,
        	'status' => SiteStatus::Live,
            'host_id' => 1,
            'update_instructions' => 'Test instructions.'
        ]);

        DB::table('sites')->insert([
        	'client_id' => 7,
        	'name' => 'Interactive Client DB',
        	'technology' => Technologies::Laravel,
            'status' => SiteStatus::InDevelopment,
            'host_id' => 6,
        ]);

    }
}
