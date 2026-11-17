<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function getImageUrlAttribute(): string
    {
        return asset('images/projects/' . $this->image);
    }
}