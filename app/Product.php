<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 't_products';

    protected $casts = [
        'brand' => 'array',
        'size_id' => 'array',
    ];
    protected $fillable = [
        'name','brand_id','description','price','size_id','status',
        'gpd_id', 'gpd_barcode', 'ean',
        'description_long',
        'vat', 'price_excl',
        'season', 'price_stock',
        'color_nr', 'color',
        'image', 'reordered',
        'retourned','user_id','season'
    ];

    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }

}
