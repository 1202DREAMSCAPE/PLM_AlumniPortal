<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    use HasFactory;
    protected $primaryKey = 'PartnerID';

    protected $fillable = [
        'ComName',
        'EmailAdd',
        'Accepted',
        'Address',
        'CPerson',
        'PartType',
        'StartDate',
        'EndDate',
        'Link',
    ];
}