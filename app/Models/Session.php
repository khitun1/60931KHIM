<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Session extends Model
{
    use HasFactory;
    protected $fillable = ['film_id', 'hall_id', 'beginning'];
    public function hall() : BelongsTo
    {
        return $this->belongsTo(Hall::class);
    }

    public function film() : BelongsTo
    {
        return $this->belongsTo(Film::class);
    }

    public function tickets() : HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function price() : HasOne
    {
        return $this->hasOne(Price::class);
    }
}
