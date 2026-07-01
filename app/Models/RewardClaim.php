<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardClaim extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'student_profile_id',
        'reward_id',
        'used_points',
        'status',
        'claimed_at',
        'processed_at',
        'processed_by',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'used_points' => 'integer',
            'claimed_at' => 'datetime',
            'processed_at' => 'datetime',
        ];
    }

    public function studentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }

    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }

    public function processor()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }
}
