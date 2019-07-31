<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
        	'name' => 'MMA',
        	'description' => 'Interactive team responsible for basic maintenance of the site, including plugin updates, theme updates, security, and general health of the site. Includes hosting.',
        	'price' => 75
        ]);

        DB::table('services')->insert([
        	'name' => 'SEO',
        	'description' => 'SEO',
        ]);

        DB::table('services')->insert([
        	'name' => 'Retainer',
        	'description' => 'Hourly retainer to be used for site improvements.',
        ]);

        DB::table('services')->insert([
        	'name' => 'Hosting',
        	'description' => 'Firespring to host client site.',
        ]);
    }
}
