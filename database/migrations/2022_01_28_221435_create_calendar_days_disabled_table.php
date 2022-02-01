<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarDaysDisabledTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_days_disabled', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calendar_id')->references('id')->on('calendar')->onUpdate('no action')->onDelete('no action')->nullable(false);
            $table->dateTime('day')->nullable(false);
            $table->boolean('enabled')->unsigned()->nullable(false);
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
        Schema::dropIfExists('calendar_days_disabled');
    }
}
