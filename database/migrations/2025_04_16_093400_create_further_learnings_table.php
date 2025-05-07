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
        Schema::create('further_learnings', function (Blueprint $table) {
            $table->id();
			$table->foreignId('path_id')->constrained('learning_paths');
			$table->text('suggestion_text');
			$table->foreignId('related_path_id')->nullable()->constrained('learning_paths');
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('further_learnings');
    }
};
