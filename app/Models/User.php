<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public const ROLE_ADMIN = 'admin';
    public const ROLE_CLEANER = 'cleaner';
    public const ROLE_CUSTOMER = 'customer';
    public const ROLE_TYPES = [
        self::ROLE_ADMIN,
        self::ROLE_CLEANER,
        self::ROLE_CUSTOMER,
    ];
    protected $fillable = [
       'name',
       'user_name',
       'email',
       'password',
       'phone_number',
       'address',
       'identification',
       'role_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function cleaner(): HasOne
    {
        return $this->hasOne(Cleaner::class);
    }
}
