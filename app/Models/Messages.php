<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    protected $primaryKey = 'HelpID';

    protected $fillable = [
        'SNum',
        'name',
        'email',
        'Graduated',
        'Course',
        'RDate',
        'Description',
        'Status',
    ];
}
