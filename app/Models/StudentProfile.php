<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentProfile extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'user_id',
        'nim',
        'program_studi',
        'angkatan',
        'phone',
        'bio',
        'photo',
        'github_url',
        'linkedin_url',
        'profile_completion',
    ];

    protected function casts(): array
    {
        return [
            'angkatan' => 'integer',
            'profile_completion' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function point()
    {
        return $this->hasOne(Point::class);
    }

    public function pointHistories()
    {
        return $this->hasMany(PointHistory::class);
    }

    public function rewardClaims()
    {
        return $this->hasMany(RewardClaim::class);
    }

    public function aiRecommendations()
    {
        return $this->hasMany(AiRecommendation::class);
    }

    public function verifications()
    {
        return $this->hasMany(Verification::class);
    }

    public function calculateCompletion(): int
    {
        $score = 0;
        $total = 8;

        if ($this->photo) $score++;
        if ($this->user->name) $score++;
        if ($this->nim) $score++;
        if ($this->program_studi) $score++;
        if ($this->angkatan) $score++;
        if ($this->phone) $score++;
        if ($this->user->email) $score++;
        if ($this->bio) $score++;

        return (int) round(($score / $total) * 100);
    }
}
