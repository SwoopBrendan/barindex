<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type_id',
        'bar_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\HasOne|object|null
     */
    public function userType()
    {
        return $this->hasOne(UserType::class, 'id', 'user_type_id')->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\HasOne|object|null
     */
    public function bar()
    {
        return $this->hasOne(Bar::class, 'id', 'bar_id')->first();
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->userType()->id == config('user_types.admin');
    }

    /**
     * @return bool
     */
    public function isBarOwner(): bool
    {
        return $this->userType()->id == config('user_types.bar_owner');
    }

    /**
     * @return bool
     */
    public function isBarManager(): bool
    {
        return $this->userType()->id == config('user_types.bar_manager');
    }

    /**
     * @return bool
     */
    public function isBartender(): bool
    {
        return $this->userType()->id == config('user_types.bartender');
    }

    /**
     * @return bool
     */
    public function isCustomer(): bool
    {
        return $this->userType()->id == config('user_types.customer');
    }
}
