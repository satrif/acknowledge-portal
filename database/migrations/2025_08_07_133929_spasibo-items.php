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
        //
        Schema::create('spasibo-items', function (Blueprint $table) {
            $table->id(); // Автоинкрементный первичный ключ
            $table->string('a_type', 10);
            $table->string('name', 100);
            $table->text('description');
            $table->boolean('active');
            $table->string('name_en', 100)->nullable();
            $table->text('description_en')->nullable();
            $table->text('questions')->nullable();
            $table->text('questions_en')->nullable();
            $table->timestamps(); // Добавляет created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('spasibo-items');
    }
};
