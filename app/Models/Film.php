<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    use HasFactory;
    public function sessions() : HasMany
    {
        return $this->hasMany(Session::class);
    }

    public function halls() : BelongsToMany
    {
        return $this->belongsToMany(Hall::class);
    }
}
