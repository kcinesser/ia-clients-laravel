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
        	'site_id' => 10,
        	'service_id' => 5
        ]);

        DB::table('service_site')->insert([
        	'site_id' => 11,
        	'service_id' => 5
        ]);

        DB::table('service_site')->insert([
        	'site_id' => 2,
        	'service_id' => 1
        ]);

        DB::table('service_site')->insert([
        	'site_id' => 8,
        	'service_id' => 1
        ]);

        DB::table('service_site')->insert([
        	'site_id' => 6,
        	'service_id' => 1
        ]);
    }
}
