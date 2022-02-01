<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('external_id')->nullable(true);
            $table->integer('external_budget_id')->nullable(true);
            $table->integer('external_route_id')->nullable(true);
            $table->integer('track_id')->nullable(true);
            $table->string('name')->nullable(true);
            $table->string('notes')->nullable(true);
            $table->timestamp('timestamp')->nullable();
            $table->string('arrival_address')->nullable(true);
            $table->timestamp('arrival_timestamp')->nullable(false);
            $table->string('departure_address')->nullable(false);
            $table->timestamp('departure_timestamp')->nullable(true);
            $table->integer('capacity')->nullable(true);
            $table->boolean('confirmed_pax_count')->unsigned()->nullable(false);
            $table->timestamp('reported_departure_timestamp')->nullable(true);
            $table->integer('reported_departure_kms')->nullable(true);
            $table->timestamp('reported_arrival_timestamp')->nullable(true);
            $table->integer('reported_arrival_kms')->nullable(true);
            $table->integer('reported_vehicle_plate_number')->nullable(true);
            $table->integer('status')->nullable(false);
            $table->string('status_info')->nullable(true);
            $table->boolean('reprocess_status')->unsigned()->nullable(false);
            $table->boolean('return')->unsigned()->nullable(false);
            $table->timestamp('created')->nullable(true);
            $table->timestamp('modified')->nullable(true);
            $table->string('synchronized_downstream')->nullable(true);
            $table->string('synchronized_upstream')->nullable(true);
            $table->integer('province_id')->nullable(true);
            $table->boolean('sale_tickets_drivers')->nullable(true);
            $table->string('notes_drivers')->nullable(true);
            $table->text('itinerary_drivers')->nullable(true);
            $table->string('cost_if_externalized')->nullable(true);
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
        Schema::dropIfExists('services');
    }
}
