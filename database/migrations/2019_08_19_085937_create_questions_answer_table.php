<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('question_id');
            $table->string('answers');
            $table->timestamps();
        });

        Schema::table('question_answers', function (Blueprint $table) {
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
        Schema::dropIfExists('question_answers');

        Schema::table('question_answers', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
        });
    }
}
