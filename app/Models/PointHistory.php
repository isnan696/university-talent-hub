<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointHistory extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'student_profile_id',
        'source_type',
        'source_id',
        'point_change',
        'description',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'point_change' => 'integer',
            'created_at' => 'datetime',
        ];
    }

    public function studentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }
}
