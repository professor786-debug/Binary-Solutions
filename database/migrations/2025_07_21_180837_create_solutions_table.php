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
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('course_name', 256)->index();
            $table->string('subject_area', 255)->nullable();
            $table->text('problem_statement')->nullable();
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();

            $table->string('universty_name', 256);
            $table->string('year', 256);
            $table->string('country', 256);
            $table->string('city', 256);
            $table->string('slug', 256);
            $table->text('source_code_path')->nullable();
            $table->text('video_demo_path')->nullable();
            $table->text('walkthrough_path')->nullable();
            $table->text('report_path')->nullable();
            $table->text('preview_image')->nullable();
            $table->boolean('has_tutorial_session')->default(0);
            $table->integer('price')->nullable();
            $table->integer('download_limit')->nullable();
            $table->string('status', 200)->nullable()->default('Draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solutions');
    }
};
