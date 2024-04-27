<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('partnerships', function (Blueprint $table) {
            $table->id('PartnerID'); // This will create a column named 'PartnerID' as the primary key
            $table->string('ComName', 50)
            ->nullable(); // Company Name
            $table->string('EmailAdd', 50)
            ->nullable(); // Company Email Address
            $table->string('Address', 50)
             ->nullable(); // Company Address
            $table->string('CPerson', 50)
            ->nullable(); // Name of the Primary Contact Person
            $table->string('PartType', 50)
            ->nullable(); // Type of Partnership
            $table->date('StartDate')
            ->nullable(); // Start Date of Partnership
            $table->date('EndDate')
            ->nullable(); // End Date of Partnership
            $table->timestamps();
            $table->boolean('Accepted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('partnerships', function (Blueprint $table) {
            $table->dropColumn('Accepted');
        });
    }
};