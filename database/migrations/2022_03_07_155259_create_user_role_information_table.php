<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRoleInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role_information', function (Blueprint $table) {
            $table->id();
            $table->integer('login')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('role_id')->nullable();
            $table->char('role_name',50)->nullable();
            $table->boolean('user_status')->default(true);
            $table->text('skills_description')->nullable();
            $table->text('about_me')->nullable();
            $table->string('specialization_text')->nullable();
            $table->string('specialization_id')->nullable();
            $table->json('skills')->default(json_encode([]));
            $table->integer('service_price')->default(0);
            $table->boolean('is_activated')->default(false);
            $table->softDeletes();
            $table->timestamp('last_seen')->nullable();
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
        Schema::dropIfExists('user_role_information');
    }
}
