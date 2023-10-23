<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class SubCategory extends Model
{
    use HasFactory;
    protected $guard = false;
    public $timestamps = false;
    public function products()
    {
        return $this->hasMany(Product::class, 'sub_category_id');
    }
}
