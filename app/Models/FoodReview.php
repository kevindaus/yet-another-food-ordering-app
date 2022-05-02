<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodReview extends Model
{
    use HasFactory;

    const RATING_1 = 1;
    const RATING_2 = 2;
    const RATING_3 = 3;
    const RATING_4 = 4;
    const RATING_5 = 5;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'rating',
        'food_id',
        'customer_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'food_id' => 'integer',
        'customer_id' => 'integer',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
