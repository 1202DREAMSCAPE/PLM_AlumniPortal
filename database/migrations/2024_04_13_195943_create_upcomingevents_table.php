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
        Schema::create('UpcomingEvents', function (Blueprint $table) {
            $table->id('EventID');
            $table->string('EventName')
            ->nullable();
            $table->date('EDate')
            ->nullable();
            $table->string('ELoc')
            ->nullable();
            $table->text('EDesc')
            ->nullable();
            $table->time('TimeStart')
            ->nullable();
            $table->time('TimeEnd')
            ->nullable();
            $table->timestamps();
            $table->boolean('Accepted')
            ->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('UpcomingEvents');
    }
};
