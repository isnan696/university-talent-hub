<?php

namespace App\Repositories\Interfaces;

interface VerificationRepositoryInterface
{
    public function create(array $data);
    public function findPending();
    public function findById(string $id);
    public function updateStatus(string $id, string $status, string $verifiedBy, ?string $notes = null);
    public function getHistory(string $studentProfileId);
    public function countPending();
}
