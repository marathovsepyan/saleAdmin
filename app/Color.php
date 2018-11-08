<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 't_colors';

    protected $fillable = [
        'number', 'name','user_id','brand_id'
    ];

    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }

    public function colorBrand()
    {
        return $this->belongsToMany(Brand::class,'t_color_brand','color_id','brand_id')->withTimestamps();
    }
}
