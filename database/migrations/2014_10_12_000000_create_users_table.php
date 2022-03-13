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
            $table->integer('login')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('address')->nullable();
            $table->boolean('gender')->default(true);
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('uuid')->nullable();
            $table->string('email_verify_uuid')->nullable();
            $table->string('profile_header_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_accept_students')->default(false);
            $table->boolean('is_service_payable')->default(false);
            $table->boolean('is_mail_notification_enabled')->default(true);
            $table->boolean('is_phone_notification_enabled')->default(false);
            $table->boolean('is_email_confirmed')->default(false);
            $table->rememberToken();
            $table->softDeletes();
            $table->date('birthday')->nullable();
            $table->string('default_role')->nullable();
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
