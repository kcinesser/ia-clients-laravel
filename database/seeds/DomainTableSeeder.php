<?php

use Illuminate\Database\Seeder;

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
        	'exp_date' => '2019-12-31',
        	'client_id' => 1,
            'site_id' => 1
        ]);

        DB::table('hosted_domains')->insert([
            'name' => 'test.spikesbbg.com',
            'exp_date' => '2019-12-31',
            'client_id' => 1,
        ]);   

        DB::table('hosted_domains')->insert([
        	'name' => 'travcontakeover.com/',
        	'exp_date' => '2019-12-31',
        	'client_id' => 4,
        ]);        
    }
}
