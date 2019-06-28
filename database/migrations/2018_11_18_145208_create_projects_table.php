<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_code', 6)->unique();
            $table->string('project_name');
            $table->string('coordinator_name');
            $table->string('coordinator_phone', 8)->nullable();
            $table->string('coordinator_cellphone', 8);
            $table->string('coordinator_email');
            $table->string('location')->nullable();
            $table->string('city');
            $table->string('description', 350)->nullable();
            $table->string('additional_coordinator_info', 350)->nullable();
            $table->string('created_date');
            $table->string('end_date')->nullable();
            $table->unsignedInteger('partner_id')->nullable();
            $table->timestamps();

            $table->foreign('partner_id')
                ->references('id')->on('partners')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
