<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 't_sizes';

    protected $fillable = [
        'size_1', 'size_2', 'size_3',
    ];
}
