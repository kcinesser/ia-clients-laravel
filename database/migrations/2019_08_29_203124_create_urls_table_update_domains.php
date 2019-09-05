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

        $domains = DB::table('hosted_domains')->get();

        foreach($domains as $domain) {
            $site = DB::table('sites')->find($domain->site_id);

            $url = [
                'site_id' => $site->id,
                'url' => $domain->name
            ];

            DB::table('site_urls')->insert($url);

            $client = DB::table('clients')->find($site->client_id);

            DB::table('hosted_domains')->where('id', $domain->id)->update(['client_id' => $client->id]);
        }

        Schema::table('hosted_domains', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->change();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('set null');
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
        Schema::create('registrars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('url');
            $table->timestamps();
        });

        Schema::create('domain_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('url');
            $table->timestamps();
        });

        Schema::table('hosted_domains', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->nullable()->change();
            $table->dropForeign(['client_id']);
        });

        Schema::rename('hosted_domains', 'domains');

        Schema::table('domains', function (Blueprint $table) {
            $table->unsignedInteger('registrar_id')->nullable();
            $table->unsignedInteger('domain_account_id')->nullable();

            $table->foreign('registrar_id')->references('id')->on('registrars')->onDelete('set null');
            $table->foreign('domain_account_id')->references('id')->on('domain_accounts')->onDelete('set null');
        });

        Schema::dropIfExists('site_urls');
    }
}
