<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\Interfaces\StudentRepositoryInterface::class,
            \App\Repositories\StudentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\SkillRepositoryInterface::class,
            \App\Repositories\SkillRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\CertificateRepositoryInterface::class,
            \App\Repositories\CertificateRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\PortfolioRepositoryInterface::class,
            \App\Repositories\PortfolioRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\VerificationRepositoryInterface::class,
            \App\Repositories\VerificationRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\RewardRepositoryInterface::class,
            \App\Repositories\RewardRepository::class
        );
        $this->app->bind(
            \App\Repositories\Interfaces\OpportunityRepositoryInterface::class,
            \App\Repositories\OpportunityRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}
