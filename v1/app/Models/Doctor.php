<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'email',
        'mobile',
        'gender',
        'address',
        'pincode',
        'city',
        'department',
        'govt_id_type',
        'id_number',
        'profile_image',
        'professional_image',
    ];

    public $hidden = [
        'password',
    ];
}
