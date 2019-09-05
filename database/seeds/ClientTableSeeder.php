<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
        	'name' => 'Spikes BBG',
        	'account_manager_id' => 7,
        	'contact_name' => 'Mike K.',
        	'contact_email' => 'test@test.com',
        	'contact_phone' => '1231231234'
        ]);

        DB::table('clients')->insert([
        	'name' => 'Lincoln Berean',
        	'account_manager_id' => 10,
        	'contact_name' => 'Contact Name',
        	'contact_email' => 'test@test.com',
        	'contact_phone' => '1231231234'
        ]);

        DB::table('clients')->insert([
            'name' => 'SL Green',
            'account_manager_id' => 9,
            'contact_name' => 'SL Green Contact',
            'contact_email' => 'test@test.com',
            'contact_phone' => '1231231234'
        ]);

        DB::table('clients')->insert([
            'name' => 'LRS Healthcare',
            'account_manager_id' => 9,
            'contact_name' => 'LRS Contact',
            'contact_email' => 'test@test.com',
            'contact_phone' => '1231231234',
            'status' => 3
        ]);

        DB::table('clients')->insert([
            'name' => 'NU Foundation',
            'account_manager_id' => 8,
            'contact_name' => 'NU Contact',
            'contact_email' => 'test@test.com',
            'contact_phone' => '1231231234',
            'status' => 3
        ]);

        DB::table('clients')->insert([
            'name' => 'Firespring - Marketing',
            'account_manager_id' => 12,
            'contact_name' => 'Erin Soper',
            'contact_email' => 'test@test.com',
            'contact_phone' => '1231231234'
        ]);

        DB::table('clients')->insert([
            'name' => 'Firespring - Interactive',
            'account_manager_id' => 8,
            'contact_name' => 'Brandon Rakes',
            'contact_email' => 'test@test.com',
            'contact_phone' => '1231231234'
        ]);

    }
}
