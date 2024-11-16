<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cleaner extends Model
{
    protected $table = 'cleaners';

    protected $fillable = [
        'user_id',
        'rating',
        'point',
        'cv',
        'cv_file',
        'status',
        'can_cleaning',
        'can_market',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function orderApplications(): HasMany
    {
        return $this->hasMany(OrderApplication::class);
    }
}
