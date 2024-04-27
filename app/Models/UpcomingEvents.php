<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingEvents extends Model
{
    use HasFactory;

    protected $table = 'UpcomingEvents'; // Explicitly set the table name
    protected $primaryKey = 'EventID';

    protected $fillable = [
        'EventName',
        'EDate',
        'ELoc',
        'EDesc',
        'TimeStart',
        'TimeEnd',
    ];
}
