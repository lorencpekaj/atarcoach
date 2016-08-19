<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubjectChapterQuestionConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Delete if chapter deleted
        Schema::table('chapters', function (Blueprint $table) {
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });

        // Delete if chapter deleted
        Schema::table('questions_sets', function (Blueprint $table) {
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
        });
        
        // Delete if question set deleted
        Schema::table('questions', function (Blueprint $table) {
            $table->foreign('question_set_id')->references('id')->on('questions_sets')->onDelete('cascade');
        });

        // Delete if question deleted
        Schema::table('question_choices', function (Blueprint $table) {
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
        Schema::table('chapters', function (Blueprint $table) {
            $table->dropForeign(['subject_id']);
        });
        
        Schema::table('questions_sets', function (Blueprint $table) {
            $table->dropForeign(['chapter_id']);
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['question_set_id']);
        });

        Schema::table('question_choices', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
        });
    }
}
