<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\State;
use App\Models\Image;
use Illuminate\Database\Eloquent\SoftDeletes;


class Sheet extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'description', 'idea', 'creator'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
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
