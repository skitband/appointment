<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('service_name', 250)->nullable();
            $table->string('staff_name', 250)->nullable();
            $table->dateTime('date_time')->nullable();
            $table->string('customer_name', 250)->nullable();
            $table->string('customer_email', 250)->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
