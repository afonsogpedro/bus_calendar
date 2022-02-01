<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable(true);
            $table->string('phone_number')->nullable(true);
            $table->string('picture')->nullable(true);
            $table->string('email');
            $table->string('password')->nullable(true);
            $table->dateTime('last_online')->nullable(true);
            $table->string('verification_code')->nullable(true);
            $table->string('new_email')->nullable(true);
            $table->integer('status');
            $table->boolean('first');
            $table->dateTime('last_accept_date')->nullable(true);
            $table->dateTime('created')->nullable(true);
            $table->dateTime('modified')->nullable(true);
            $table->string('company_contact')->nullable(true);
            $table->decimal('credits', 16, 4)->nullable(true);;
            $table->boolean('first_trip');
            $table->boolean('incomplete_profile');
            $table->boolean('phone_verify');
            $table->string('token_auto_login')->nullable(true);
            $table->string('user_vertical')->nullable(true);
            $table->integer('language_id')->nullable(true);
            $table->boolean('no_registered');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
