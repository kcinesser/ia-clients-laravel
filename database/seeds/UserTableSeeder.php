<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Nick Esser',
        	'email' => 'nicolas.esser@firespring.com',
            'password' => bcrypt('password'),
            'role' => 0
        ]);

        DB::table('users')->insert([
        	'name' => 'Matia Ward',
        	'email' => 'matia.ward@firespring.com',
            'password' => bcrypt('password'),
            'role' => 0
        ]);

        DB::table('users')->insert([
        	'name' => 'Sergio Esquivel',
        	'email' => 'Sergio.Esquivel@firespring.com',
            'password' => bcrypt('password'),
            'role' => 0
        ]);

        DB::table('users')->insert([
        	'name' => 'Cam Penner',
        	'email' => 'cam.penner@firespring.com',
            'password' => bcrypt('password'),
            'role' => 0
        ]);

        DB::table('users')->insert([
        	'name' => 'Allison Steufer',
        	'email' => 'allison.steufer@firespring.com',
            'password' => bcrypt('password'),
            'role' => 0
        ]);

        DB::table('users')->insert([
            'name' => 'Jeff Ray',
            'email' => 'jeff.ray@firespring.com',
            'password' => bcrypt('password'),
            'role' => 0
        ]);

        DB::table('users')->insert([
        	'name' => 'Dylan Urias',
        	'email' => 'dylan.urias@firespring.com',
            'password' => bcrypt('password'),
            'role' => 1
        ]);

        DB::table('users')->insert([
        	'name' => 'Brandon Rakes',
        	'email' => 'brandon.rakes@firespring.com',
            'password' => bcrypt('password'),
            'role' => 1
        ]);

        DB::table('users')->insert([
        	'name' => 'Jacque Alexander',
        	'email' => 'jacque.alexander@firespring.com',
            'password' => bcrypt('password'),
            'role' => 1
        ]);

        DB::table('users')->insert([
        	'name' => 'Alex Wilkason',
        	'email' => 'alex.wilkason@firespring.com',
            'password' => bcrypt('password'),
            'role' => 1
        ]);

        DB::table('users')->insert([
        	'name' => 'Ashley Kumpula',
        	'email' => 'ashley.kumpula@firespring.com',
            'password' => bcrypt('password'),
            'role' => 1
        ]);

        DB::table('users')->insert([
        	'name' => 'Erin Soper',
        	'email' => 'erin.Soper@firespring.com',
            'password' => bcrypt('password'),
            'role' => 1
        ]);
    }
}
