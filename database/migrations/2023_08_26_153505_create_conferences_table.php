<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferencesTable extends Migration
{
    public function up()
    {
        // Check if the table doesn't exist before creating it
        if (!Schema::hasTable('conferences')) {
            Schema::create('conferences', function (Blueprint $table) {
                $table->id();
                $table->string('code')->unique();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        // Check if the table exists before dropping it
        if (Schema::hasTable('conferences')) {
            Schema::dropIfExists('conferences');
        }
    }
}
