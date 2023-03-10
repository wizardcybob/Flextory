<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'service', 'mulTD', 'divTP'];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
