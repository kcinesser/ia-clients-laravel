<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRemoteIdentifierToHostedDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hosted_domains', function (Blueprint $table) {
            $table->integer('remote_provider_type')->nullable();
            $table->integer('remote_provider_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hosted_domains', function (Blueprint $table) {
            $table->dropColumn(['remote_provider_type', 'remote_provider_id']);
        });
    }
}
