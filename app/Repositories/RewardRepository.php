<?php

namespace App\Repositories;

use App\Models\Reward;
use App\Repositories\Interfaces\RewardRepositoryInterface;

class RewardRepository implements RewardRepositoryInterface
{
    public function all()
    {
        return Reward::with('category')->orderByDesc('created_at')->get();
    }

    public function findById(string $id)
    {
        return Reward::with('category')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Reward::create($data);
    }

    public function update(string $id, array $data)
    {
        $reward = Reward::findOrFail($id);
        $reward->update($data);
        return $reward;
    }

    public function delete(string $id)
    {
        return Reward::findOrFail($id)->delete();
    }

    public function findActive()
    {
        return Reward::with('category')
            ->where('status', 'active')
            ->where('stock', '>', 0)
            ->orderByDesc('created_at')
            ->get();
    }

    public function decrementStock(string $id)
    {
        return Reward::findOrFail($id)->decrement('stock');
    }
}
