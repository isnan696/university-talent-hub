<?php

namespace App\Console\Commands;

use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use Illuminate\Console\Command;

class ExpireOpportunities extends Command
{
    protected $signature = 'opportunities:expire';
    protected $description = 'Expire opportunities that have passed their end date';

    public function __construct(private OpportunityRepositoryInterface $opportunityRepository)
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $count = $this->opportunityRepository->expirePastOpportunities();
        $this->info("{$count} opportunities expired.");
    }
}
