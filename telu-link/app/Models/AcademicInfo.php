<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcademicInfo extends Model
{
    protected $table = 'academic_info';

    protected $fillable = [
        'type',
        'title',
        'description',
        'provider',
        'deadline',
        'requirements',
        'link',
        'attachment_url',
        'created_by'
    ];

    protected $casts = [
        'deadline' => 'date',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
