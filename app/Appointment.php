<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //

    protected $table = 'appointments';

    public $timestamps = true;

    protected $fillable = ['service_name', 'staff_name', 'date_time', 'customer_name', 'customer_email', 'created_at', 'updated_at']; 
}
