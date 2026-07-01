<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\StudentRepositoryInterface;

class LeaderboardController extends Controller
{
    public function __construct(private StudentRepositoryInterface $studentRepository) {}

    public function index()
    {
        $leaderboard = $this->studentRepository->getLeaderboard(50);
        return view('student.leaderboard.index', compact('leaderboard'));
    }
}
