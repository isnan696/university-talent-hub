<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(private DashboardService $dashboardService) {}

    public function index(): JsonResponse
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            $data = $this->dashboardService->getAdminDashboard();
        } else {
            $data = $this->dashboardService->getStudentDashboard($user);
        }

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }
}
