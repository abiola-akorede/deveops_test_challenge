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
        Schema::create('operationals', function (Blueprint $table) {
            $table->id();
            $table->longText('operational_workflow');
            $table->longText('production_plan');
            $table->longText('supply_chain');
            $table->longText('quality_control');
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('business_profiles')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operationals');
    }
};
