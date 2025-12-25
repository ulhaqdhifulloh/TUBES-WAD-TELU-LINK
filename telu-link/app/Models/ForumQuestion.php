<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForumQuestion extends Model
{
    protected $fillable = [
        'user_id',
        'category',
        'title',
        'content',
        'is_solved'
    ];

    protected $casts = [
        'is_solved' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(ForumAnswer::class, 'question_id');
    }
}
