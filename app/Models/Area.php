<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;
use App\Models\Adearea;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'link'];

    public function projets()
    {
        return $this->belongsToMany(Projet::class);
    }

    public function adearea()
    {
        return $this->belongsTo(Adearea::class);
    }
}
