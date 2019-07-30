<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\Owners;

class AddOwnerToRegistrars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrars', function (Blueprint $table) {
            $table->tinyInteger('owner')->unsigned()->default(Owners::Firespring)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrars', function (Blueprint $table) {
            //
        });
    }
}
