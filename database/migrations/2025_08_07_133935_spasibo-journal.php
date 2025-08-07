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
        Schema::create('spasibo-journal', function (Blueprint $table) {
            $table->id();
            $table->integer('uid_send')->nullable();
            $table->integer('uid_to');
            $table->timestamp('date_send');
            $table->integer('v_id');
            $table->integer('n_id')->nullable();
            $table->text('description');
            $table->text('nom_description')->nullable();
            $table->timestamps();
            $table->foreign('uid_send')->references('id')->on('users');
            $table->foreign('uid_to')->references('id')->on('users');
            $table->foreign('v_id')->references('id')->on('spasibo-items');
            $table->foreign('n_id')->references('id')->on('spasibo-items');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('spasibo-journal');
    }
};
