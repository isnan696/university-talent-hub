<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'student_profile_id',
        'skill_name',
        'category',
        'level',
        'description',
        'verification_status',
    ];

    protected function casts(): array
    {
        return [
            'verification_status' => 'string',
        ];
    }

    public function studentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }

    public function verification()
    {
        return $this->morphOne(Verification::class, 'verifiable');
    }

    public function scopePending($query)
    {
        return $query->where('verification_status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('verification_status', 'approved');
    }
}
