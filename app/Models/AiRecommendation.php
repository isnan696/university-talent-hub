<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiRecommendation extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'student_profile_id',
        'recommendation_type',
        'title',
        'description',
        'priority',
        'status',
        'generated_at',
        'expires_at',
    ];

    protected function casts(): array
    {
        return [
            'priority' => 'integer',
            'generated_at' => 'datetime',
            'expires_at' => 'datetime',
        ];
    }

    public function studentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
