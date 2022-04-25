<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'date_opened',
        'service_options',
        'location_longitude',
        'location_latitude',
        'address_1',
        'address_2',
        'town',
        'city',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date_opened' => 'timestamp',
        'service_options' => 'array',
        'location_longitude' => 'double',
        'location_latitude' => 'double',
        'user_id' => 'integer',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function restaurantBusinessHours()
    {
        return $this->hasMany(RestaurantBusinessHours::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
