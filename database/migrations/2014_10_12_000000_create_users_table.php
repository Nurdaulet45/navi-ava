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
            $table->string('login');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('country_id');
            $table->string('address');
            // true - male, false female
            $table->boolean('gender')->default(true);
            $table->text('skills_description')->nullable();
            $table->text('about_me')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('specialization')->nullable();
            $table->string('specialization_id')->nullable();
            $table->string('profile_header_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->json('skills')->default(json_encode([]));
            $table->string('password');
            $table->boolean('is_accept_students')->default(false);
            $table->boolean('is_service_payable')->default(false);
            $table->integer('service_price')->nullable();
            $table->boolean('is_mail_notification_enabled')->default(true);
            $table->boolean('is_phone_notification_enabled')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
