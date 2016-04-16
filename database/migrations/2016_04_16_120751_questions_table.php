<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Question Sets <has many> Questions
        Schema::create('questions_sets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chapter_id')->unsigned();
            $table->text('information')->nullable();
            $table->timestamps();
        });


        // Questions <belongs to> Question Sets
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_set_id')->unsigned()->nullable();
            $table->text('questions');
            $table->morphs('type');
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
        Schema::drop('questions_sets');
        Schema::drop('questions');
    }
}
