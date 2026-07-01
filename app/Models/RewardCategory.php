<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardCategory extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['name', 'description'];

    public function rewards()
    {
        return $this->hasMany(Reward::class, 'category_id');
    }
}
