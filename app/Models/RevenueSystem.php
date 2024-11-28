<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RevenueSystem extends Model
{
    protected $table = 'revenue_systems';

    protected $fillable = [
        'order_id',
        'revenue_percent',
        'revenue_amount',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
