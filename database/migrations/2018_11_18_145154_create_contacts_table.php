<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 250);
            $table->string('position');
            $table->string('cellphone', 20);
            $table->string('phone', 15)->nullable();
            $table->string('location', 250)->nullable();
            $table->unsignedInteger('partner_id');
            $table->timestamps();

            $table->foreign('partner_id')
                ->references('id')->on('partners')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
