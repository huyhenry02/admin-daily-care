<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CleaningOrder extends Model
{
    protected $table = 'cleaning_orders';

    protected $fillable = [
        'order_id',
        'name_customer',
        'phone_customer',
        'home_type',
        'address',
        'total_price',
        'deposit',
        'status',
        'start_time',
        'service_cleaning_hour_id',
        'note',
        'is_cleaning_other',
        'is_cook',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
