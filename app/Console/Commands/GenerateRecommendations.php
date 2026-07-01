<?php

namespace App\Console\Commands;

use App\Services\RecommendationService;
use Illuminate\Console\Command;

class GenerateRecommendations extends Command
{
    protected $signature = 'recommendations:generate';
    protected $description = 'Generate AI recommendations for all students';

    public function __construct(private RecommendationService $recommendationService)
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $this->info('Generating recommendations for all students...');
        $this->recommendationService->generateForAllStudents();
        $this->info('Recommendations generated successfully.');
    }
}
