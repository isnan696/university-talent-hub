<?php

namespace App\Repositories;

use App\Models\Portfolio;
use App\Repositories\Interfaces\PortfolioRepositoryInterface;

class PortfolioRepository implements PortfolioRepositoryInterface
{
    public function findByStudent(string $studentProfileId)
    {
        return Portfolio::where('student_profile_id', $studentProfileId)
            ->orderByDesc('created_at')
            ->get();
    }

    public function create(array $data)
    {
        return Portfolio::create($data);
    }

    public function update(string $id, array $data)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update($data);
        return $portfolio;
    }

    public function delete(string $id)
    {
        return Portfolio::findOrFail($id)->delete();
    }

    public function findPending()
    {
        return Portfolio::where('verification_status', 'pending')
            ->with('studentProfile.user')
            ->get();
    }

    public function countByStudent(string $studentProfileId)
    {
        return Portfolio::where('student_profile_id', $studentProfileId)->count();
    }
}
