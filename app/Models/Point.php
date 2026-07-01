<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'student_profile_id',
        'total_points',
        'last_updated',
    ];

    protected function casts(): array
    {
        return [
            'total_points' => 'integer',
            'last_updated' => 'datetime',
        ];
    }

    public function studentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }

    public function addPoints(int $amount): void
    {
        $this->increment('total_points', $amount);
        $this->update(['last_updated' => now()]);
    }

    public function deductPoints(int $amount): void
    {
        $this->decrement('total_points', $amount);
        $this->update(['last_updated' => now()]);
    }
}
