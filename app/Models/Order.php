<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'customer_id',
        'cleaner_id',
        'service_type',
        'status',
        'pay_status',
        'feedback',
        'rating',
        'old_order_id',
        'feedback_date',
        'number_of_repetition',
        'is_required',
        'has_tool',
        'has_animals',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function cleaner(): BelongsTo
    {
        return $this->belongsTo(Cleaner::class, 'cleaner_id');
    }

    public function cleaningOrder(): HasOne
    {
        return $this->hasOne(CleaningOrder::class);
    }

    public function marketOrder(): HasOne
    {
        return $this->hasOne(MarketOrder::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function orderApplication(): HasMany
    {
        return $this->hasMany(OrderApplication::class, 'order_id');
    }
}
