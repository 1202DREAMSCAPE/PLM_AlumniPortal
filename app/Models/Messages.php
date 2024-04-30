<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parallax\FilamentComments\Models\Traits\HasFilamentComments;


class Messages extends Model
{
    use HasFactory, HasFilamentComments;

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
