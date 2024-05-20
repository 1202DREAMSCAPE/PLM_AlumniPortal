<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;
    protected $table = 'workexp';
    protected $fillable = [
        'user_id',
        'EmploymentStatus',
        'JobTitle',
        'CompanyName',
        'EmploymentCountry',
        'WorkIndustry',
        'WorkSector',
        'StartOfEmployment',
        'EndOfEmployment',
    ];
}
