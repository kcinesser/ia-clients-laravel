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
        DB::table('domains')->insert([
        	'name' => 'https://spikesbbg.com',
        	'exp_date' => '2019-12-31',
        	'client_id' => 1,
        ]);

        DB::table('domains')->insert([
        	'name' => 'staging.tough-party.flywheelsites.com',
        	'exp_date' => '2019-12-31',
        	'client_id' => 1,
        ]);

        DB::table('domains')->insert([
        	'name' => 'https://www.lincolnberean.org',
        	'exp_date' => '2019-12-31',
        	'client_id' => 2,
        ]);

        DB::table('domains')->insert([
        	'name' => 'http://staging.lincoln-berean.flywheelsites.com',
        	'exp_date' => '2019-12-31',
        	'client_id' => 2,
        ]);       

        DB::table('domains')->insert([
        	'name' => 'https://slgreen.com',
        	'exp_date' => '2019-12-31',
        	'client_id' => 3,
        ]);        

        DB::table('domains')->insert([
        	'name' => 'https://www.onevanderbilt.com/',
        	'exp_date' => '2019-12-31',
        	'client_id' => 3,
        ]);        

        DB::table('domains')->insert([
        	'name' => 'https://www.461fifthavenue.com/',
        	'exp_date' => '2019-12-31',
        	'client_id' => 3,
        ]);        

        DB::table('domains')->insert([
        	'name' => 'slg-sustainability.flywheelsites.com',
        	'exp_date' => '2019-12-31',
        	'client_id' => 3,
        ]);        

        DB::table('domains')->insert([
        	'name' => 'https://lrshealthcare.com',
        	'exp_date' => '2019-12-31',
        	'client_id' => 4,
        ]);        

        DB::table('domains')->insert([
        	'name' => 'lrshealthcare.flywheelsites.com',
        	'exp_date' => '2019-12-31',
        	'client_id' => 4,
        ]);        

        DB::table('domains')->insert([
        	'name' => 'https://travcontakeover.com/',
        	'exp_date' => '2019-12-31',
        	'client_id' => 4,
        ]);        

        DB::table('domains')->insert([
        	'name' => 'https://unfpublic.wpengine.com',
        	'exp_date' => '2019-12-31',
        	'client_id' => 5,
        ]);        

        DB::table('domains')->insert([
        	'name' => 'https://blog.firespring.com',
        	'exp_date' => '2019-12-31',
        	'client_id' => 6,
        ]);

        DB::table('domains')->insert([
        	'name' => 'staging.funny-quicksand.flywheelsites.com',
        	'exp_date' => '2019-12-31',
        	'client_id' => 6,
        ]);

        DB::table('domains')->insert([
        	'name' => 'https://ia-clients.herokuapp.com',
        	'exp_date' => '2019-12-31',
        	'client_id' => 7,
        ]);
    }
}
