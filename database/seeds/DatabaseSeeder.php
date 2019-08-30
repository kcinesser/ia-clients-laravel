<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call([
			UserTableSeeder::class,	
            ServiceTableSeeder::class,
            ClientTableSeeder::class,
            HostingTableSeeder::class,
            SiteTableSeeder::class,
            JobTableSeeder::class,
            DomainTableSeeder::class,
            ServiceSiteSeeder::class
		]);
    }
}
