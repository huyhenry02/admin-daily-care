<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MarketOrder extends Model
{
    protected $table = 'market_order';
    protected $fillable = [
        'order_id',
        'deposit_price',
        'service_price',
        'expect_price',
        'bought_price',
        'status',
        'delivery_time',
        'note',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function marketOrderDetails(): HasMany
    {
        return $this->hasMany(MarketOrderDetail::class);
    }
}
