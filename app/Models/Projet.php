<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Area;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'link'];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }
}
