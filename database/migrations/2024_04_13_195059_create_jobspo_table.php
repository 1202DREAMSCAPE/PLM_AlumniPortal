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
        Schema::create('JobPO', function (Blueprint $table) {
            $table->id('JobID');
            $table->string('JTitle', 50)
            ->nullable(); 
            $table->string('JLocation', 50)
            ->nullable(); 
            $table->string('Salary', 50)
            ->nullable(); 
            $table->string('EmailAdd', 50)
            ->nullable(); 
            $table->string('Address', 50)
            ->nullable(); 
            $table->string('CPerson', 50)
            ->nullable(); 
            $table->string('EmpType', 50)
            ->nullable();
            $table->string('CIndustry', 50)
            ->nullable(); 
            $table->string('CName', 50)
            ->nullable(); 
            $table->string('JDesc', 50)
            ->nullable(); 
            $table->string('CNumCompany', 50)
            ->nullable(); 
            $table->timestamps();
            $table->boolean('Accepted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('JobPO');
    }
};
