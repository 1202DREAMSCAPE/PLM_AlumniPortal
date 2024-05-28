<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EducationalBackground extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'school',
        'educattain',
        'degree',
        'gwa',
        'honors',
        'startperiod',
        'endperiod',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
