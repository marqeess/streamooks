<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public function livro()
    {
        return $this->belongsTo('App\Livro');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}
