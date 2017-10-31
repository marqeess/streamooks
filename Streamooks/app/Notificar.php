<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificar extends Model
{
    public function editora()
    {
        return $this->belongsTo('App\Editora');
    }
    public function autor()
    {
        return $this->belongsTo('App\Autor');
    }
    public function livro()
    {
        return $this->belongsTo('App\Livro');
    }
}
