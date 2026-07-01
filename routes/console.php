<?php

use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\GenerateRecommendations;
use App\Console\Commands\ExpireOpportunities;

Schedule::command('recommendations:generate')->daily();
Schedule::command('opportunities:expire')->daily();
