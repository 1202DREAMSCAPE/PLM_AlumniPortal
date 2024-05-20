<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class UpcomingEvents extends Model
{
    use HasFactory;

    protected $table = 'UpcomingEvents'; // Explicitly set the table name
    protected $primaryKey = 'EventID';

    use HasFactory;

    protected $fillable = [
        'photo',
        'EventName',
        'EDate',
        'ELoc',
        'EDesc',
        'TimeStart',
        'TimeEnd',
        'Accepted',
    ];

    public function getPhotoUrlAttribute()
    {
        return $this->photo ? Storage::url($this->photo) : null;
    }
}
