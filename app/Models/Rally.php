<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rally extends Model
{
    use HasFactory;

    protected $table = 'rally';

    protected $fillable = [
        'punctuality_drive_timeDiff',
        'skill_drive_penalty',
        'penalty',
        'points',
        'ranking',
    ];


    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
