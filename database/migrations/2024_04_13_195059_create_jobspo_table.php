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
            ->nullable(); // Job Title
            $table->string('JLocation', 50)
            ->nullable(); // Job Location
            $table->string('Salary', 50)
            ->nullable(); // Salary
            $table->string('EmailAdd', 50)
            ->nullable(); // Company Email Address
            $table->string('Address', 50)
            ->nullable(); // Company Address
            $table->string('CPerson', 50)
            ->nullable(); // Name of the Primary Contact Person
            $table->string('EmpType', 50)
            ->nullable(); // Type of Employment
            $table->string('CIndustry', 50)
            ->nullable(); // Company Industry
            $table->string('CName', 50)
            ->nullable(); // Company Name
            $table->string('JDesc', 50)
            ->nullable(); // Job Description
            $table->string('CNumCompany', 50)
            ->nullable(); // Company Number
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
