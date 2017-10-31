<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seditora extends Model
{
    public function editora()
    {
        return $this->belongsTo('App\Editora');
    }
}
