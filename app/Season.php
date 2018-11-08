<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = 't_seasons';
    protected $fillable = ['name'];
}
