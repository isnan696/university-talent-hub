<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reward extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'required_points',
        'stock',
        'image',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'required_points' => 'integer',
            'stock' => 'integer',
        ];
    }

    public function category()
    {
        return $this->belongsTo(RewardCategory::class, 'category_id');
    }

    public function claims()
    {
        return $this->hasMany(RewardClaim::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function isAvailable(): bool
    {
        return $this->status === 'active' && $this->stock > 0;
    }
}
