<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Area;
use App\Models\Teacher;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'ressources', 'pistar', 'image', 'year'];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
}
