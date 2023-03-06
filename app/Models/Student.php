<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'actif'];

    public function projets()
    {
        return $this->belongsToMany(Projet::class);
    }
}
