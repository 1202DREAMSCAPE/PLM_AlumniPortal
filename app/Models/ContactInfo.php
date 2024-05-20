<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ContactInfo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'email',
        'telephone_number',
        'cellphone_number',
        'home_address',
        'country',
        'city',
        'province',
        'region',
        'postal_code',
        'linkedin_account_link',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
