<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->uuid('user_id');
            $table->unsignedInteger('question_id');
            $table->string('answer');
            $table->timestamps();
        });

        Schema::table('user_answers', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_answers');
        Schema::table('user_answers', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
        });
    }
}
