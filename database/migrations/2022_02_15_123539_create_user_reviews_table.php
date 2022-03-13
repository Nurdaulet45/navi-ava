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
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->tinyInteger('user_role_id')->nullable();
            $table->char('user_role_name', 50)->nullable();
            $table->foreignId('reviewer_id')->constrained('users')->cascadeOnDelete();
            $table->char('reviewer_role_name',50)->nullable();
            $table->text('text');
            $table->foreignId('parent_id')->nullable()->constrained('user_reviews');
            $table->char('parent_role_name',50)->nullable();
            $table->enum('rate', [1, 2, 3, 4, 5])->nullable();
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
