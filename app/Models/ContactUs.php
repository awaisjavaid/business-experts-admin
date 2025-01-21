<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'nationality',
        'business_activity',
        'plan_to_start',
        'message',
    ];
}
