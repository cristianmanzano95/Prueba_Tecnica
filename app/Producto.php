<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //

    protected $table = 'Producto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'codigo', 'precio', 'categoria', 'imagen',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'estado',
        'created_at',
        'updtaed_at',

    ];
    
}