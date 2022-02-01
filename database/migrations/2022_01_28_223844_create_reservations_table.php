<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_plan_id')->references('id')->on('user_plans')->onUpdate('no action')->onDelete('no action')->nullable(false);
            $table->foreignId('route_id')->references('id')->on('routes')->onUpdate('no action')->onDelete('no action')->nullable(false);
            $table->integer('track_id')->nullable(true);
            $table->dateTime('reservation_start')->nullable(false);
            $table->dateTime('reservation_end')->nullable(false);
            $table->integer('route_stop_origin_id')->nullable(true);
            $table->integer('route_stop_destination_id')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
