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
        Schema::table('descriptions', function (Blueprint $table) {

            $table->uuid('profile_id')->change();
            $table->foreign('profile_id')->references('profile_id')->on('business_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('descriptions', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
            $table->unsignedBigInteger('profile_id')->change();
            $table->foreign('profile_id')->references('id')->on('business_profiles')->onDelete('cascade');
        });
    }
};
