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
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->string('address')->nullable();
            // true - male, false female
            $table->boolean('gender')->default(true);
            /*
             * С чем можете помочь
             * С какими навыками можете помочь?
             * */
            $table->text('skills_description')->nullable();
            /*
             * О себе
             */
            $table->text('about_me')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('specialization_text')->nullable();
            $table->string('uuid')->nullable();
            $table->string('email_verify_uuid')->nullable();
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
            $table->boolean('is_email_confirmed')->default(false);
            $table->rememberToken();
            $table->softDeletes();
            $table->date('birthday')->nullable();
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
