<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\StudentProfile;
use App\Models\Point;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin Universitas',
            'email' => 'admin@talenthub.ac.id',
            'password' => 'password',
            'role' => 'administrator',
        ]);

        $student1 = User::create([
            'name' => 'Ahmad Isnan Wahyudi',
            'email' => 'student@talenthub.ac.id',
            'password' => 'password',
            'role' => 'student',
        ]);

        $student2 = User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@talenthub.ac.id',
            'password' => 'password',
            'role' => 'student',
        ]);

        $student3 = User::create([
            'name' => 'Citra Dewi',
            'email' => 'citra@talenthub.ac.id',
            'password' => 'password',
            'role' => 'student',
        ]);

        $profiles = [
            [
                'user_id' => $student1->id,
                'nim' => '23.11.1234',
                'program_studi' => 'D3 Teknik Informatika',
                'angkatan' => 2023,
                'phone' => '081234567890',
                'bio' => 'Backend Developer enthusiast.',
                'profile_completion' => 75,
            ],
            [
                'user_id' => $student2->id,
                'nim' => '23.11.5678',
                'program_studi' => 'S1 Sistem Informasi',
                'angkatan' => 2023,
                'phone' => '081234567891',
                'bio' => 'Frontend Web Developer.',
                'profile_completion' => 62,
            ],
            [
                'user_id' => $student3->id,
                'nim' => '23.11.9012',
                'program_studi' => 'D3 Teknik Informatika',
                'angkatan' => 2024,
                'phone' => '081234567892',
                'bio' => 'UI/UX Designer and Mobile Developer.',
                'profile_completion' => 88,
            ],
        ];

        foreach ($profiles as $profileData) {
            $profile = StudentProfile::create($profileData);
            Point::create([
                'student_profile_id' => $profile->id,
                'total_points' => fake()->numberBetween(10, 150),
                'last_updated' => now(),
            ]);
        }
    }
}
