<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function pharmacies()
    {
        return $this->belongsToMany(Pharmacy::class, 'pharmacy_products', 'product_id', 'pharmacy_id')
            ->withTimestamps(); // Include timestamps if they exist
    }



    public function pharmacyProduct()
    {
        return $this->hasMany(PharmacyProduct::class);
    }
}
