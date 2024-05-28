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
        Schema::create('messages', function (Blueprint $table) {
            $table->id('HelpID');
            $table->string('student_no')->nullable();
            $table->string('name');
            $table->string('email');
            $table->year('Graduated')->nullable();
            $table->string('Course')->nullable();
            $table->date('RDate')->nullable();
            $table->longText('Description')->nullable();
            $table->string('Status')->default('Unread');
            $table->timestamps();
            $table->foreign('student_no')->references('student_no')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
