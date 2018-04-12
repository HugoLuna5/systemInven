<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $table = 'product';


    public function scopeSearch($query, $s){

        return $query->where('nombre', 'like', '%'.$s.'%')
            ->orWhere('cod_barras', 'like','%'.$s.'%');
    }
}
