<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    protected $fillable = [
        'name',
        'description',
        'logo',
        'category',
        'contact',
        'instagram',
        'president_name'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
