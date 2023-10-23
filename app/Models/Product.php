<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KindAnimal;

class Product extends Model
{
    use HasFactory;
    protected $guard = false;

    public function kindOfAnimal()
    {
        return $this->belongsTo(KindAnimal::class, 'kind_of_animal');
    }
}
