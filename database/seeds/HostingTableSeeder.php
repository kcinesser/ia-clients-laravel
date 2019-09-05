<?php

use Illuminate\Database\Seeder;

class HostingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hosting')->insert([
            'name' => 'Flywheel',
            'details' => "Firespring's Hosting Bulk Plan",
            'owner' => \App\Enums\Owners::Firespring,
        ]);

        DB::table('hosting')->insert([
            'name' => 'Union Bank Server',
            'details' => "Union Bank has own hosting server. Contact Alex Lewis alex.lewis@ubt.com regarding server issues.",
            'owner' => \App\Enums\Owners::Client,
        ]);

        DB::table('hosting')->insert([
            'name' => 'Amazon Web Services - SLG',
            'details' => "SLG AWS account. We have access",
            'owner' => \App\Enums\Owners::Client,
        ]);

        DB::table('hosting')->insert([
            'name' => 'cPanel Server Tomcat - LRS',
            'details' => "Through a third party. We have access to cPanel.",
            'owner' => \App\Enums\Owners::ThirdParty,
        ]);

        DB::table('hosting')->insert([
            'name' => 'WPEngine - NU Foundation',
            'details' => "NU foundation has service through WP Engine",
            'owner' => \App\Enums\Owners::Client,
        ]);

        DB::table('hosting')->insert([
            'name' => 'Heroku',
            'details' => "Under info.interactive@firespring.com account.",
            'owner' => \App\Enums\Owners::Firespring,
        ]);

    }
}
