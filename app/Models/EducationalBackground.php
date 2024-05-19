<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    use HasFactory;

    protected $fillable = [
        'school',
        'educattain',
        'degree',
        'gwa',
        'honors',
        'startperiod',
        'endperiod',
    ];
}
