<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Area;
use App\Models\Teacher;
use App\Models\Image;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projet extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'description', 'ressource', 'pistar', 'year', 'image_id'];

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

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
