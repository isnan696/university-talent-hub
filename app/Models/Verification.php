<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'student_profile_id',
        'verifiable_type',
        'verifiable_id',
        'status',
        'verified_by',
        'verified_at',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'verified_at' => 'datetime',
        ];
    }

    public function studentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }

    public function verifiable()
    {
        return $this->morphTo();
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function verificationLogs()
    {
        return $this->hasMany(VerificationLog::class);
    }
}
