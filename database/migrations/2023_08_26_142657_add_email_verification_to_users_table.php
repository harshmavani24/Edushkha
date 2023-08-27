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
        // Check if the column exists before adding it
        if (!Schema::hasColumn('users', 'email_verification_token')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('email_verification_token')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Check if the column exists before removing it
        if (Schema::hasColumn('users', 'email_verification_token')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('email_verification_token');
            });
        }
    }
};
