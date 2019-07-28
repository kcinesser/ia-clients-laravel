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
        	'account_manager_id' => 6,
        	'contact_name' => 'Mike K.',
        	'contact_email' => 'test@test.com',
        	'contact_phone' => '1231231234'
        ]);

        DB::table('clients')->insert([
        	'name' => 'Lincoln Berean',
        	'account_manager_id' => 9,
        	'contact_name' => 'Contact Name',
        	'contact_email' => 'test@test.com',
        	'contact_phone' => '1231231234'
        ]);

    }
}
