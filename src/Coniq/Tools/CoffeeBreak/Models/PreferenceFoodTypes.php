<?php

namespace src;

use Illuminate\Database\Eloquent\Model;

class PreferenceFoodTypes extends Model
{
    protected $table = 'preference_food_types';

    protected $fillable = [
        'food_type', // sendwich, toast
        'description',
        'type_id' // food or drink
    ];

    
    public function getFoodTypes()
    {
        return $this->getAttribute('food');
    }
}
