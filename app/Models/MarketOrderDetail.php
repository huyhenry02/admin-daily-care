<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MarketOrderDetail extends Model
{
    protected $table = 'market_order_details';

    protected $fillable = [
        'market_order_id',
        'name_product',
    ];

    public function marketOrder(): BelongsTo
    {
        return $this->belongsTo(MarketOrder::class);
    }
}
