<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\StudentRepositoryInterface;

class LeaderboardController extends Controller
{
    public function __construct(private StudentRepositoryInterface $studentRepository) {}

    public function index()
    {
        $leaderboard = $this->studentRepository->getLeaderboard(100);
        return view('admin.leaderboard.index', compact('leaderboard'));
    }
}
