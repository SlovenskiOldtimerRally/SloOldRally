<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $fillable = [
        'title',
        'date',
        'time',
        'location',
        'info',
        'user_id',
        'club_id',
        'rally_id',
    ];


    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function rally(): BelongsTo
    {
        return $this->belongsTo(Rally::class);
    }

    /* public function setDateAttribute($value){
        $this->attributes['date']
    } */
}
