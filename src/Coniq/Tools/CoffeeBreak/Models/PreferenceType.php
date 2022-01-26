<?php

namespace src;

use Illuminate\Database\Eloquent\Model;

class PreferenceTypes extends Model
{
    protected $table = 'preference_types';

    protected $fillable = [
        'type',   //food, drink
        'description',
    ];


    public function getTypes()
    {
        return $this->getAttribute('type');
    }
}
