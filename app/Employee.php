<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //

    protected $table = 'employees';

    public $timestamps = true;

    protected $fillable = ['employee_name', 'created_at', 'updated_at']; 
}
