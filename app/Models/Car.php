<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use HasFactory;

    protected $table = 'car';

    protected $fillable = [
        'name',
        'year',
        'user_id'
    ];

    public function club(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
