<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('webinar_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('webinar_id');
            $table->timestamp('registered_at')->nullable();
            $table->timestamps();
        });

        Schema::table('webinar_registrations', function (Blueprint $table) {
            if (!Schema::hasColumn('webinar_registrations', 'user_id')) {
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }

            if (!Schema::hasColumn('webinar_registrations', 'webinar_id')) {
                $table->unsignedBigInteger('webinar_id');
                $table->foreign('webinar_id')->references('id')->on('webinars')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webinar_registrations');
    }
}
