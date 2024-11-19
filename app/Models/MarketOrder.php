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
        'from_name_customer',
        'from_phone_customer',
        'from_home_type',
        'from_address',
        'to_name_customer',
        'to_phone_customer',
        'to_home_type',
        'to_address',
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
