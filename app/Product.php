<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['name', 'qty', 'price', 'product'];

    protected $casts = [
        'product' => 'array'
    ];
}
