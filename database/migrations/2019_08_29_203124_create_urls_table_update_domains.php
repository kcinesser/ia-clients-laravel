<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\URLEnvironment;
use App\Enums\URLType;

class CreateUrlsTableUpdateDomains extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_urls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('environment')->unsigned()->default(URLEnvironment::Live)->nullable();
            $table->tinyInteger('type')->unsigned()->default(URLType::Primary)->nullable();
            $table->string('url');
            $table->unsignedInteger('site_id');
            $table->timestamps();

            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
        });

        Schema::table('domains', function (Blueprint $table) {
            $table->dropForeign(['domain_account_id']);
            $table->dropForeign(['registrar_id']);
            $table->dropColumn('domain_account_id');
            $table->dropColumn('registrar_id');

            $table->unsignedInteger('site_id')->nullable()->change();
            $table->unsignedInteger('client_id')->nullable();
        });

        Schema::rename('domains', 'hosted_domains');

        $domains = App\HostedDomain::all();

        foreach($domains as $domain) {
            $site = $domain->site;

            $url = new App\SiteURL();
            $url->site_id = $site->id;
            $url->url = $domain->name;

            $url->save();
        }

        foreach($domains as $domain) {
            $client = $domain->site->client;

            $domain->update(['client_id' => $client->id]);
        }

        Schema::table('hosted_domains', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->change();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });

        Schema::dropIfExists('registrars');
        Schema::dropIfExists('domain_accounts');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_urls');
    }
}
