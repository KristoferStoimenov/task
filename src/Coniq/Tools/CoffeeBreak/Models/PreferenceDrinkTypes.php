<?php

namespace src;

use Illuminate\Database\Eloquent\Model;

class PreferenceDrinkTypes extends Model
{
    protected $table = 'preference_drink_types';

    protected $fillable = [
        'drink_type', // coffee, tea
        'description',
        'type_id' // food or drink
    ];

    
    public function getDrinkTypes()
    {
        return $this->getAttribute('drink_type');
    }
}
