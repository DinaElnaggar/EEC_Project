<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PharmacyProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function pharmacy()
    {
        return $this->hasMany(Pharmacy::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
