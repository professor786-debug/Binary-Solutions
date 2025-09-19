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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->index();
            $table->unsignedBigInteger('solution_id')->nullable()->index();
            $table->unsignedBigInteger('package_id')->nullable()->index();
            $table->decimal('base_price', 10, 2);
            $table->text('addons')->nullable();
            $table->decimal('addon_total', 10, 2)->default(0.00);
            $table->decimal('grand_total', 10, 2);
            $table->enum('payment_status', ['completed', 'due'])->default('due');
            $table->string('payment_method', 50)->nullable();
            $table->string('stripe_charge_id', 200)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            // Optional foreign keys if needed
            // $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            // $table->foreign('solution_id')->references('id')->on('solutions')->onDelete('set null');
            // $table->foreign('package_id')->references('id')->on('subscription_plans')->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
