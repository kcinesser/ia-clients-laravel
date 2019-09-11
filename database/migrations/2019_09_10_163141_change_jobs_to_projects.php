<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeJobsToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('jobs', 'projects');

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['job_id']);

            $table->renameColumn('job_id', 'project_id');

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });

        Schema::table('updates', function (Blueprint $table) {
            $table->dropForeign(['site_id']);

            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('projects', 'jobs');
    }
}
