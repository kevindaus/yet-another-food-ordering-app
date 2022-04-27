<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'mobile_number',
        'address_1',
        'address_2',
        'postcode',
        'town',
        'province',
        'address_location_longitude',
        'address_location_latitude',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'address_location_longitude' => 'double',
        'address_location_latitude' => 'double',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function foodReviews()
    {
        return $this->hasMany(FoodReview::class);
    }

    public function fullName(): Attribute
    {
        return Attribute::make(fn($value, $attributes) => sprintf("%s %s", $attributes['first_name'], $attributes['last_name']));
    }
}
