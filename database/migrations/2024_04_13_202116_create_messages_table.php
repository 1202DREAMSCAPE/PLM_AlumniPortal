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
        Schema::create('Messages', function (Blueprint $table) {
            $table->id('HelpID');
            $table->unsignedBigInteger('SNum') ->nullable();
            $table->string('name');
            $table->string('email');
            $table->year('Graduated') ->nullable();
            $table->string('Course') ->nullable();
            $table->date('RDate') ->nullable();
            $table->longText('Description') ->nullable();
            $table->string('Status') ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Messages');
    }
};
