<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DomainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hosted_domains')->insert([
        	'name' => 'spikesbbg.com',
            'exp_date' => Carbon::now()->addYear(1)->addDay(1),
        	'client_id' => 1,
            'site_id' => 1
        ]);

        DB::table('hosted_domains')->insert([
            'name' => 'lincolnberean.org',
            'remote_provider_type' => '0',
            'remote_provider_id' => '123456789',
            'exp_date' => Carbon::now()->addYear(1)->addDay(10),
            'free_with_mma' => TRUE,
            'client_id' => 2,
        ]);   

        DB::table('hosted_domains')->insert([
        	'name' => 'travcontakeover.com',
            'exp_date' => Carbon::now()->addYear(1)->addDay(30),
        	'client_id' => 4,
        ]);        
    }
}
