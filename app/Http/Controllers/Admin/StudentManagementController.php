<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\StudentRepositoryInterface;

class StudentManagementController extends Controller
{
    public function __construct(private StudentRepositoryInterface $studentRepository) {}

    public function index()
    {
        $students = $this->studentRepository->getAllWithPoints();
        return view('admin.students.index', compact('students'));
    }

    public function search()
    {
        $filters = request()->only(['name', 'program_studi', 'skill', 'point_min']);
        $students = $this->studentRepository->search($filters);
        return view('admin.students.index', compact('students'));
    }

    public function show(string $id)
    {
        $student = $this->studentRepository->findWithUser($id);
        return view('admin.students.show', compact('student'));
    }
}
