<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * Determine if the user can access the Filament admin panel.
     */

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url 
            ? asset('storage/' . $this->avatar_url) 
            : asset('images/default-avatar.png');
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
        //false if you want to restrict access
        //true if you want to allow access
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'is_visible',
        'is_admin',
        'avatar_url',
        'password',
        'student_no',
        'Gender',
        'LName',
        'MName',
        'NameExt',
        'MaidenName',
        'Dept',
        'Course',
        'BDay',
        'Graduated',
        'POB',
        'ContactNum',
        'TelNum',
        'Linkedin',
        'Nationality',
        'CivilStat',
        'Address',
        'Country',
        'Province',
        'Region',
        'City',
        'PostalCode',
        'Skills',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
        'is_visible' => 'boolean',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'student_no';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The posts that belong to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the user's contact information.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contactInfo(): HasOne
{
    return $this->hasOne(ContactInfo::class, 'user_id', 'student_no');
}


    /**
     * Get the messages for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Messages::class, 'student_no', 'student_no');
    }

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'user_id', 'student_no');
    }
}

