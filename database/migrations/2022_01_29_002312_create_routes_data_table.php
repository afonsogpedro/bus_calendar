<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->references('id')->on('routes')->onUpdate('no action')->onDelete('no action')->nullable(false);;
            $table->foreignId('calendar_id')->references('id')->on('calendar')->onUpdate('no action')->onDelete('no action')->nullable(false);;
            $table->integer('vinculation_route')->nullable(true);
            $table->boolean('route_circular')->unsigned()->nullable(false);
            $table->dateTime('date_init')->nullable(false);
            $table->dateTime('date_finish')->nullable(false);
            $table->boolean('mon')->unsigned()->nullable(false);
            $table->boolean('tue')->unsigned()->nullable(false);
            $table->boolean('wed')->unsigned()->nullable(false);
            $table->boolean('thu')->unsigned()->nullable(false);
            $table->boolean('fri')->unsigned()->nullable(false);
            $table->boolean('sat')->unsigned()->nullable(false);
            $table->boolean('sun')->unsigned()->nullable(false);
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
        Schema::dropIfExists('routes_data');
    }
}
