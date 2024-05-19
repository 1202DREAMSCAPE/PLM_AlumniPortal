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
            Schema::create('workexp', function (Blueprint $table) {
                $table->id();
                $table->string('EmploymentStatus');
                $table->string('JobTitle');
                $table->string('CompanyName');
                $table->string('EmploymentCountry');
                $table->string('WorkIndustry');
                $table->string('WorkSector');
                $table->date('StartOfEmployment');
                $table->date('EndOfEmployment')->nullable();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workexp');
    }
};
