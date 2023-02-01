<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public $fillable = [
        'doctor_id',
        'user_id',
        'patient_name',
        'email',
        'mobile',
        'gender',
        'appointment_time',
        'appointment_date',
        'prescription',
        'doctor_name',
        'department',
        'payment_status',
        'razorpay_payment_id',
        'status',
        'amount',
    ];

}
