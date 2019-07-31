<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUpdateInstructions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->text('update_instructions')->nullable();
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->text('notes')->nullable();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->dropColumn('update_instructions');
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('notes');
        });
    }
}
