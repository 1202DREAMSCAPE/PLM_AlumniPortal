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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id'); 
            $table->foreign('user_id')->references('student_no')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('upcoming_event_id');
            $table->foreign('upcoming_event_id')->references('EventID')->on('UpcomingEvents')->onDelete('cascade');            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
