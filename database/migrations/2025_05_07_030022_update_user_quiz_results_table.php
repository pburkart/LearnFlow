<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_quiz_results', function (Blueprint $table) {
            // Drop the score column
            $table->dropColumn('score');
            // Add answer and is_correct columns
            $table->unsignedTinyInteger('answer')->after('quiz_id');
            $table->boolean('is_correct')->after('answer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_quiz_results', function (Blueprint $table) {
            // Reverse: drop answer and is_correct, add score
            $table->dropColumn(['answer', 'is_correct']);
            $table->integer('score');
        });
    }
};