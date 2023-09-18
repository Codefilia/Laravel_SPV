<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code', 'name', 'stock', 'image', 'sell_price', 'status', 'category_id', 'provider_id'
    ];

    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function Provider(){
        return $this->belongsTo(Provider::class);
    }
}
