<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id(); // INT AUTO_INCREMENT
            $table->char('iso', 2); // CHAR(2)
            $table->string('name', 80); // VARCHAR(80)
            $table->string('nicename', 80); // VARCHAR(80)
            $table->char('iso3', 3)->nullable(); // CHAR(3)
            $table->smallInteger('numcode')->nullable(); // SMALLINT
            $table->integer('phonecode'); // INT
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
