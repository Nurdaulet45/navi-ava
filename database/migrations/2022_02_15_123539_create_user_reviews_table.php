<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
//            $table->tinyInteger('user_role_id')->nullable();
            $table->char('user_role_name', 50)->nullable();
            $table->tinyInteger('reviewer_id')->nullable();
            $table->char('reviewer_role_name', 50)->nullable();
            $table->text('text');
            $table->foreignId('parent_id')->nullable()->constrained('user_reviews');
//            $table->char('parent_role_name',50)->nullable();
            $table->float('rate', 0, 5)->nullable();
            $table->boolean('chance')->default(true)->nullable();
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
        Schema::dropIfExists('user_reviews');
    }
}
