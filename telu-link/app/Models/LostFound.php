<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LostFound extends Model
{
    protected $table = 'lost_found';

    protected $fillable = [
        'item_name',
        'description',
        'photo',
        'status',
        'category',
        'location_found',
        'date_found',
        'contact_person',
        'user_id',
        'is_claimed',
    ];

    protected $casts = [
        'found_date' => 'date',
        'is_claimed' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
