<?php

use Illuminate\Database\Seeder;

class SiteURLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_urls')->insert([
        	'site_id' => 1,
        	'url' => 'https://spikesbbg.com',
        	'type' => 0,
        	'environment' => 1
        ]);

        DB::table('site_urls')->insert([
        	'site_id' => 1,
        	'url' => 'staging.tough-party.flywheelsites.com',
        	'type' => 0,
        	'environment' => 0
        ]);

        DB::table('site_urls')->insert([
        	'site_id' => 2,
        	'url' => 'https://www.lincolnberean.org',
        	'type' => 0,
        	'environment' => 1
        ]);

        DB::table('site_urls')->insert([
        	'site_id' => 2,
        	'url' => 'http://staging.lincoln-berean.flywheelsites.com',
        	'type' => 0,
        	'environment' => 0
        ]);
    }
}
