<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 't_brands';
    protected $casts = [
        'size_id' => 'array',
    ];

    protected $fillable = [
        'gpd_id', 'seasons_id', 'name',
        'gln', 'address', 'house', 'postal_code', 'city', 'country',
        'contact_name', 'tel', 'tel_sales', 'tel_support', 'email', 'email_sales',
        'email_support', 'website','user_id','size_id'
    ];

    public function colorBrand()
    {
        return $this->belongsToMany(Color::class,'t_color_brand','brand_id','color_id')->withTimestamps();
    }

    public function colors()
    {
        return $this->hasMany(Color::class);
    }

}
