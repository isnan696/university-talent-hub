<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;

class AdminDashboardController extends Controller
{
    public function __construct(private DashboardService $dashboardService) {}

    public function index()
    {
        $stats = $this->dashboardService->getAdminDashboard();
        return view('admin.dashboard', compact('stats'));
    }
}
