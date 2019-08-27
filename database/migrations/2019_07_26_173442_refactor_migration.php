<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\Technologies;
use App\Enums\JobStatus;
use App\Enums\UserTypes;
use App\Enums\SiteStatus;

class RefactorMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('role')->unsigned()->default(UserTypes::Developer)->nullable();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_manager_id');
            $table->string('name');
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->timestamps();

            $table->foreign('account_manager_id')->references('id')->on('users');
        });

        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('client_id');
            $table->string('name');
            $table->tinyInteger('technology')->unsigned()->default(Technologies::WordPress)->nullable();
            $table->tinyInteger('status')->unsigned()->default(SiteStatus::InDevelopment)->nullable();
            $table->text('notes')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });


        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('site_id')->nullable();
            $table->unsignedInteger('developer_id')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->tinyInteger('technology')->unsigned()->default(Technologies::WordPress)->nullable();
            $table->text('notes')->nullable();
            $table->date('go_live_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->default(NULL)->nullable();
            $table->timestamps();
            $table->tinyInteger('status')->unsigned()->default(JobStatus::Incoming)->nullable();

            $table->foreign('developer_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('set null');
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('job_id');
            $table->text('body');
            $table->boolean('completed')->default(false);
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('jobs');
        });

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

        Schema::create('domains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('exp_date')->nullable();
            $table->timestamps();
            $table->unsignedInteger('site_id');
            $table->unsignedInteger('registrar_id')->nullable();
            $table->unsignedInteger('domain_account_id')->nullable();

            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->foreign('registrar_id')->references('id')->on('registrars')->onDelete('set null');
            $table->foreign('domain_account_id')->references('id')->on('domain_accounts');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->morphs('commentable');
            $table->text('body');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });


        Schema::create('updates', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('site_id');
            $table->timestamps();

            $table->foreign('site_id')->references('id')->on('sites');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('service_site', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('site_id');
            $table->unsignedInteger('service_id');
            $table->timestamps();

            $table->foreign('site_id')->references('id')->on('sites');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->morphs('activatable');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('software_licenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('licenseable');
            $table->string('description');
            $table->string('key')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('software_licenses');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('service_site');
        Schema::dropIfExists('services');
        Schema::dropIfExists('updates');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('domains');
        Schema::dropIfExists('domain_accounts');
        Schema::dropIfExists('registrars');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('sites');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('users');
    }
}
