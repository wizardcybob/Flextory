<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;


class Sheet extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'idea', 'state'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
