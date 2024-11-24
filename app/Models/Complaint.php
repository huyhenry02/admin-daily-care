<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\OrderController;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Complaint extends Model
{
    protected $table = 'complaints';

    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';
    protected $fillable = [
        'order_id',
        'complaint_by_id',
        'description',
        'evidence',
        'status',
        'admin_decision',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function complaintBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'complaint_by_id');
    }
}
