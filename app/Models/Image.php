<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;
use App\Models\Area;
use App\Models\Sheet;
use App\Models\Adearea;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image'];

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }

    public function sheets()
    {
        return $this->hasMany(Projet::class);
    }

    public function areas()
    {
        return $this->hasMany(Projet::class);
    }

    public function adeareas()
    {
        return $this->hasMany(Projet::class);
    }
}
