<?php

namespace App\Repositories;

use App\Models\Opportunity;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;

class OpportunityRepository implements OpportunityRepositoryInterface
{
    public function all()
    {
        return Opportunity::with('creator')
            ->orderByDesc('created_at')
            ->get();
    }

    public function findById(string $id)
    {
        return Opportunity::with('creator')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Opportunity::create($data);
    }

    public function update(string $id, array $data)
    {
        $opp = Opportunity::findOrFail($id);
        $opp->update($data);
        return $opp;
    }

    public function delete(string $id)
    {
        return Opportunity::findOrFail($id)->delete();
    }

    public function findActive()
    {
        return Opportunity::where('status', 'active')
            ->orderByDesc('created_at')
            ->get();
    }

    public function expirePastOpportunities()
    {
        return Opportunity::where('end_date', '<', now())
            ->where('status', 'active')
            ->update(['status' => 'expired']);
    }
}
