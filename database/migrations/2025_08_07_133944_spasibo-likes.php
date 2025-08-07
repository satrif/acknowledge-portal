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
        Schema::create('spasibo-likes', function (Blueprint $table) {
            $table->id();
            $table->integer('a_id');
            $table->integer('uid_send');
            $table->timestamp('date_send');
            $table->timestamps();
            $table->foreign('a_id')->references('id')->on('spasibo-items');
            $table->foreign('uid_send')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('spasibo-likes');
    }
};
