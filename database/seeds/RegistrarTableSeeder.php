<?php

use Illuminate\Database\Seeder;

class RegistrarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registrars')->insert([
        	'name' => 'GoDaddy',
        	'url' => 'https://www.godaddy.com/'
        ]);

        DB::table('registrars')->insert([
        	'name' => 'Domain.com',
        	'url' => 'https://www.domain.com/'
        ]);

        DB::table('registrars')->insert([
        	'name' => 'HostGator',
        	'url' => 'https://www.hostgator.com/'
        ]);        
    }
}
