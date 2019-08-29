<?php

use Illuminate\Database\Seeder;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
        	'client_id' => 1,
        	'site_id' => 1,
        	'developer_id' => 2,
        	'title' => 'E-Commerce Rebuild',
        	'description' => 'Upgrading to PHP 7.2 via Flywheel broke the WooCommerce plugin being used on the site for league registration. Interactive team will build a custom e-commerce plugin to replace the broken plugin.',
        	'technology' => 6,
        	'go_live_date' => '2019-08-31',
        	'start_date' => '2019-06-01',
        	'end_date' => '2019-08-31',
        	'status' => 1
        ]);

        DB::table('jobs')->insert([
        	'client_id' => 3,
        	'site_id' => 8,
        	'developer_id' => 5,
        	'title' => 'Sustainability Site Build',
        	'description' => 'Interactive to build Sustainability site for SL Green.',
        	'technology' => 0,
        	'go_live_date' => '2019-08-31',
        	'start_date' => '2019-07-01',
        	'end_date' => null,
        	'status' => 1
        ]);

        DB::table('jobs')->insert([
        	'client_id' => 4,
        	'site_id' => 9,
        	'developer_id' => 3,
        	'title' => 'LRS Job Search Plugin',
        	'description' => 'LRS wants their job search functionality to tie in with their job management system. Interactive to build custom plugin for users to search for and apply for jobs on the LRS site.',
        	'technology' => 6,
        	'go_live_date' => null,
        	'start_date' => '2019-01-01',
        	'end_date' => null,
        	'status' => 3
        ]);

        DB::table('jobs')->insert([
        	'client_id' => 5,
        	'site_id' => 12,
        	'developer_id' => 4,
        	'title' => 'NU Foundation Site Build',
        	'description' => 'Interactive will build a new WordPress site for the NU Foundation.',
        	'technology' => 0,
        	'go_live_date' => null,
        	'start_date' => '2019-01-01',
        	'end_date' => null,
        	'status' => 3
        ]);


        DB::table('jobs')->insert([
        	'client_id' => 7,
        	'site_id' => 15,
        	'developer_id' => 1,
        	'title' => 'Customer DB Build',
        	'description' => 'Interactive Quarterly Rock: Interactive will build a Laravel site to replace their WordPress client database for internal use.',
        	'technology' => 2,
        	'go_live_date' => '2019-09-30',
        	'start_date' => '2019-01-01',
        	'end_date' => null,
        	'status' => 1
        ]);
    }
}
