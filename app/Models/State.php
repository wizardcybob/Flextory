<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sheet;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function sheets()
    {
        return $this->hasMany(Sheet::class);
    }
}
