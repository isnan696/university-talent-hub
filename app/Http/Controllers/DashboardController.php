<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use App\Services\RecommendationService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(
        private DashboardService $dashboardService,
        private RecommendationService $recommendationService,
    ) {}

    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        $dashboard = $this->dashboardService->getStudentDashboard($user);
        return view('student.dashboard', compact('dashboard'));
    }
}
