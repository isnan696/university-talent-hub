<?php

namespace App\Repositories\Interfaces;

interface StudentRepositoryInterface
{
    public function findByUserId(string $userId);
    public function findWithUser(string $id);
    public function search(array $filters);
    public function getAllWithPoints();
    public function getLeaderboard(int $limit = 20);
    public function updateProfile(string $id, array $data);
    public function getDashboardStats();
    public function countStudents();
}
