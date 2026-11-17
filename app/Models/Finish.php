<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finish extends Model
{
    protected $guarded = [];

    public function getImageUrlAttribute(): string
    {
        return asset('images/finishes/' . $this->image);
    }
}