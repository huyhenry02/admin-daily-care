<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCleaningHour extends Model
{
    protected $table = 'service_cleaning_hours';

    protected $fillable = [
        'name',
        'hour',
        'price',
    ];
}
