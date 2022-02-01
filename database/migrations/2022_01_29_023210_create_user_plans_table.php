<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(true);
            $table->integer('currency_id')->nullable(true);
            $table->integer('next_user_plan_id')->nullable(true);
            $table->dateTime('start_timestamp')->nullable(true);
            $table->dateTime('end_timestamp')->nullable(true);
            $table->dateTime('renewal_timestamp')->nullable(true);
            $table->integer('renewal_price')->nullable(true); //es decimal con 10 digitos
            $table->boolean('requires_invoice')->nullable(true);
            $table->integer('status')->unsigned()->nullable(false);
            $table->dateTime('created')->nullable(true);
            $table->dateTime('modified')->nullable(true);
            $table->boolean('financiation')->nullable(true);
            $table->boolean('status_financiation')->nullable(true);
            $table->string('language')->nullable(true);
            $table->string('nif')->nullable(true);
            $table->string('business_name')->nullable(true);
            $table->integer('pending_payment')->unsigned()->nullable(false);
            $table->dateTime('date_max_payment')->nullable(true);
            $table->dateTime('proxim_start_timestamp')->nullable(true);
            $table->dateTime('proxim_end_timestamp')->nullable(true);
            $table->dateTime('proxim_renewal_timestamp')->nullable(true);
            $table->integer('proxim_renewal_price')->unsigned()->nullable(true); //decimal
            $table->integer('credits_return')->nullable(true);
            $table->integer('company_id')->nullable(true);
            $table->boolean('cancel_employee')->nullable(true);
            $table->boolean('force_renovation')->nullable(true);
            $table->dateTime('date_canceled')->nullable(true);
            $table->integer('amount_confirm_canceled')->nullable(true); //decimal
            $table->integer('credit_confirm_canceled')->nullable(true); //decimal
            $table->integer('cost_center_id')->nullable(true);
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
        Schema::dropIfExists('user_plans');
    }
}
