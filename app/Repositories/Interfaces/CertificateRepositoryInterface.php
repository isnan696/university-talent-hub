<?php

namespace App\Repositories\Interfaces;

interface CertificateRepositoryInterface
{
    public function findByStudent(string $studentProfileId);
    public function create(array $data);
    public function update(string $id, array $data);
    public function delete(string $id);
    public function findPending();
    public function countByStudent(string $studentProfileId);
}
