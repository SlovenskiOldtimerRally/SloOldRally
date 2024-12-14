<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'category',
        'year',
        'coefficient',
        'user_id',
    ];

    // Relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
