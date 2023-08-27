<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->dateTime('event_date');
            $table->string('format');

            // Foreign keys for academic_programs and campus_locations
            $table->unsignedBigInteger('academic_program_id')->nullable();
            $table->unsignedBigInteger('campus_location_id')->nullable();

            $table->timestamps();

            // Setting up the foreign key constraints
            $table->foreign('academic_program_id')->references('id')->on('academic_programs')->onDelete('set null');
            $table->foreign('campus_location_id')->references('id')->on('campus_locations')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            // Dropping foreign key constraints and columns before dropping the entire table
            $table->dropForeign(['academic_program_id']);
            $table->dropForeign(['campus_location_id']);
            $table->dropColumn('academic_program_id');
            $table->dropColumn('campus_location_id');
        });

        Schema::dropIfExists('events');
    }
}
