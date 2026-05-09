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
        Schema::create('descriptions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('overview')->require();
            $table->longText('structure');
            $table->longText('country');
            $table->string('state');
            $table->string('local_govt');
            $table->string('street');
            $table->string('ownership');
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('business_profiles')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descriptions');
    }
};
