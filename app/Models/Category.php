<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sheet;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function sheets()
    {
        return $this->hasMany(Sheet::class);
    }
}
