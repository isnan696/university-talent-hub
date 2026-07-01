<?php

namespace App\Repositories\Interfaces;

interface RewardRepositoryInterface
{
    public function all();
    public function findById(string $id);
    public function create(array $data);
    public function update(string $id, array $data);
    public function delete(string $id);
    public function findActive();
    public function decrementStock(string $id);
}
