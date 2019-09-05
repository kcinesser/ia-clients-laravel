<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateClientsSitesForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('software_licenses', function (Blueprint $table) {
            $table->string('key')->nullable()->change();
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign(['developer_id']);
            $table->dropForeign(['client_id']);
            $table->dropForeign(['site_id']);

            $table->foreign('developer_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('set null');
        });

        Schema::table('domains', function (Blueprint $table) {
            $table->unsignedInteger('registrar_id')->nullable()->change();

            $table->dropForeign(['domain_account_id']);
            $table->dropForeign(['registrar_id']);
            $table->dropForeign(['site_id']);

            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->foreign('registrar_id')->references('id')->on('registrars')->onDelete('set null');
            $table->foreign('domain_account_id')->references('id')->on('domain_accounts');
        });

        Schema::table('service_site', function(Blueprint $table) {
            $table->dropForeign(['service_id']);

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('software_licenses', function (Blueprint $table) {
            $table->string('key')->change();
        });
    }
}
