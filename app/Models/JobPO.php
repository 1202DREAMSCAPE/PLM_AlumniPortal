<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPO extends Model
{
    use HasFactory;
    protected $table = 'JobPO'; // Explicitly set the table name
    protected $primaryKey = 'JobID';

    protected $fillable = [
        'JTitle',
        'JLocation',
        'Salary',
        'EmailAdd',
        'Address',
        'CPerson',
        'EmpType',
        'CIndustry',
        'CName',
        'JDesc',
        'CNumCompany',
        'Accepted',
    ];
}
