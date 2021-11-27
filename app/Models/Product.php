<?php

namespace App\Models;

class Product
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'Nome',
        'Descrizione',
        'Prezzo',
        'Immagine',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [];
}
