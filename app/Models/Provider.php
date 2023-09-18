<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name', 'email', 'ruc_number', 'address', 'phone_number'
    ];

    public function Products(){
        return $this->hasMany(Product::class);
    }
}
