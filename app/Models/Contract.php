<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    protected $table = 'contracts';

    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_ACTIVE = 'active';
    protected $fillable = [
        'cleaner_id',
        'name',
        'start_date',
        'end_date',
        'terms',
        'commission',
        'attachment_file',
        'status',
    ];

    public function cleaner(): BelongsTo
    {
        return $this->belongsTo(Cleaner::class);
    }
}
