<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAppointmentColumnDescriptionAndDuration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('appointments', function (Blueprint $table) {
            $table->text('notes')->nullable();
            $table->integer('duration')->nullable();
            $table->dateTime('date_time_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('shop_users', function (Blueprint $table) {
            $table->dropColumn(['notes', 'duration', 'date_time_end']);
        });
    }
}
