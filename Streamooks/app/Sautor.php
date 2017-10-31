<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sautor extends Model
{
    public function autor()
    {
        return $this->belongsTo('App\Autor');
    }
}
