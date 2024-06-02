<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Messages extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'HelpID';

    protected $fillable = [
        'student_no',
        'name',
        'email',
        'Graduated',
        'Course',
        'RDate',
        'Description',
        'Status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'student_no', 'student_no');
    }

    public function routeNotificationForMail()
    {
        return $this->email;
    }
}
