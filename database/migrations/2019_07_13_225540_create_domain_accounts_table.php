<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('description');
            $table->string('url');
            $table->timestamps();
        });

        Schema::table('domains', function (Blueprint $table) {
            $table->unsignedInteger('domain_account_id');

            $table->foreign('domain_account_id')->references('id')->on('domain_accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domains');
        Schema::dropIfExists('domain_accounts');
    }
}
