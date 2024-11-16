<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisements';

    public const TYPE_NEWS = 'news';
    public const TYPE_BANNER = 'banner';
    protected $fillable = [
        'title',
        'content',
        'image',
        'type',
    ];
}
