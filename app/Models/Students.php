<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    // Define the table name explicitly if it doesn't follow the Laravel naming convention
    protected $table = 'students';

    // Define the primary key
    protected $primaryKey = 'student_no';

    // Specify that the primary key is not an auto-incrementing integer
    public $incrementing = false;

    // Specify the type of the primary key if it is not an integer
    protected $keyType = 'string';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'maiden_name',
        'suffix',
        'birthdate',
        'permanent_address',
        'pedigree',
        'religion',
        'personal_email',
        'mobile_no',
        'telephone_no',
        'photo_link',
        'entry_date',
        'plm_email',
        'paying',
        'password',
        'graduation_date',
        'height',
        'weight',
        'complexion',
        'blood_type',
        'dominant_hand',
        'medical_history',
        'lrn',
        'school_name',
        'school_address',
        'school_type',
        'strand',
        'year_entered',
        'year_graduated',
        'honors_awards',
        'general_average',
        'remarks',
        'org_name',
        'org_position',
        'previous_tertiary',
        'previous_sem',
        'father_last_name',
        'father_first_name',
        'father_middle_name',
        'father_address',
        'father_contact_no',
        'father_office_employer',
        'father_office_address',
        'father_office_num',
        'mother_lastname',
        'mother_first_name',
        'mother_middle_name',
        'mother_address',
        'mother_contact_no',
        'mother_office_employer',
        'mother_office_address',
        'mother_office_num',
        'guardian_lastname',
        'guardian_first_name',
        'guardian_middle_name',
        'guardian_address',
        'guardian_contact_no',
        'guardian_office_employer',
        'guardian_office_address',
        'guardian_office_num',
        'annual_family_income'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'birthdate' => 'date',
        'entry_date' => 'date',
        'graduation_date' => 'date',
    ];
}
