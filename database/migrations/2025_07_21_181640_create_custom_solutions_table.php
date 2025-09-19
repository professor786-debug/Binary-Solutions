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
        Schema::create('custom_solutions', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('student_id')->index();
            $table->string('problem_file', 255);
            $table->text('problem_description');
            $table->string('solution_file', 255)->nullable();
            $table->integer('step');
            $table->enum('status', ['pending', 'reviewed', 'awaiting_payment', 'paid'])->default('pending');
            $table->decimal('price', 8, 2)->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_solutions');
    }
};
