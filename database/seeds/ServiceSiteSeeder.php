<?php

use Illuminate\Database\Seeder;

class ServiceSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_site')->insert([
        	'site_id' => 15,
        	'service_id' => 5
        ]);

        DB::table('service_site')->insert([
        	'site_id' => 13,
        	'service_id' => 5
        ]);

        DB::table('service_site')->insert([
        	'site_id' => 3,
        	'service_id' => 1
        ]);

        DB::table('service_site')->insert([
        	'site_id' => 8,
        	'service_id' => 1
        ]);

        DB::table('service_site')->insert([
        	'site_id' => 1,
        	'service_id' => 1
        ]);
    }
}
