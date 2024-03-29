<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Queue\Connectors\BeanstalkdConnector;

class Price extends Model
{
    use HasFactory;
    public function session() : BelongsTo
    {
        return $this->belongsTo(Session::class);
    }
}
