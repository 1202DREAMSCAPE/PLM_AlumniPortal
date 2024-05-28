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
        Schema::create('educational_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('user_id'); 
            $table->foreign('user_id')->references('student_no')->on('users')->onDelete('cascade');
            $table->string('school')->nullable();
            $table->string('educattain')->nullable();
            $table->string('degree')->nullable();
            $table->string('gwa')->nullable();
            $table->string('honors')->nullable();
            $table->date('startperiod')->nullable();
            $table->date('endperiod')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('educational_backgrounds', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop foreign key constraint
        });
        Schema::dropIfExists('educational_backgrounds');
    }
};
