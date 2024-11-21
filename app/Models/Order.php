<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $table = 'orders';

    public const STATUS_PENDING = 'pending';
    public const STATUS_GOING = 'going';
    public const STATUS_PROCESSING = 'processing';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_COMPLAINING = 'complaining';
    public const PAY_STATUS_PENDING = 'pending';
    public const PAY_STATUS_DEPOSITED = 'deposited';
    public const PAY_STATUS_PAID = 'paid';
    public const PAY_STATUS_RETURN_AMOUNT = 'return_amount';
    public const SERVICE_TYPE_MARKET = 'market';
    public const SERVICE_TYPE_CLEAN = 'clean';

    protected $fillable = [
        'name_customer',
        'phone_customer',
        'home_type',
        'address',
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
