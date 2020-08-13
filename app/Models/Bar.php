<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bar extends Model
{
    protected $fillable = [
        'name',
        'description',
        'email_address',
        'contact_number',
        'address_line_1',
        'address_line_2',
        'province_id',
        'city_id',
        'bar_owner_id',
    ];

    /**
     * @return Model|BelongsTo|object|null
     */
    public function province()
    {
        return $this->hasOne(Province::class, 'id', 'province_id')->first();
    }

    /**
     * @return Model|BelongsTo|object|null
     */
    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id')->first();

    }

    /**
     * @return Model|BelongsTo|object|null
     */
    public function barOwner()
    {
        return $this->belongsTo(User::class, 'bar_owner_id')->first();
    }

    /**
     * @param $barId
     *
     * @return mixed
     */
    public function barManagers()
    {
        return User::query()
            ->where('bar_id', $this->id)
            ->where('user_type_id', config('user_types.bar_manager'))
            ->get();
    }

    /**
     * @param $barId
     *
     * @return mixed
     */
    public function bartenders()
    {
        return User::query()
            ->where('bar_id', $this->id)
            ->where('user_type_id', config('user_types.bartender'))
            ->get();
    }
}
