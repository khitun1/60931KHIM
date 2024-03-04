<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hall extends Model
{
    use HasFactory;
    public function places() : HasMany
    {
        return $this->hasMany(Place::class);
    }

    public function session() : HasMany
    {
        return $this->hasMany(Session::class);
    }

    public function films() : BelongsToMany
    {
        return $this->belongsToMany(Film::class);
    }
}
