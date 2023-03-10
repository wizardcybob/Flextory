<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;

class Adearea extends Model
{
    use HasFactory;

     protected $fillable = ['name', 'description', 'image'];

     public function areas()
     {
         return $this->hasMany(Area::class);
     }
}