<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $table = 'diaries';

    public function slots()
    {
        return $this->hasMany('App\Models\Slot');
    }

    public function setSlots($slots)
    {
        $this->slots()->associate($slots);
    }
}