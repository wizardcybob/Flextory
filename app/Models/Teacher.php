<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Projet;
use App\Models\Status;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'permanent', 'department_id', 'status_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function projets()
    {
        return $this->belongsToMany(Projet::class);
    }

    public function sheets()
    {
        return $this->hasMany(Sheet::class);
    }
}
