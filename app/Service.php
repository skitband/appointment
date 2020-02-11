<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = 'services';

    public $timestamps = true;

    protected $fillable = ['service_name', 'service_description', 'service_duration_mm', 'created_at', 'updated_at']; 
}
