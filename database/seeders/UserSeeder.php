<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Admin\Admin;
use Illuminate\Database\Seeder;
use App\Models\Marketing\Marketer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            "first_name" => "Md. Zahid",
            "last_name" => "Admin",
            "phone" => "+8801777797141",
            "email" => "admin@gmail.com",
            "password" => Hash::make('12345678')
        ]);
        $marketer = User::create([
            "first_name" => "Md. Zahid",
            "last_name" => "Marketer",
            "phone" => "+8801777797141",
            "email" => "marketing@gmail.com",
            "password" => Hash::make('12345678')
        ]);
        $student = User::create([
            "first_name" => "Md. Zahid",
            "last_name" => "Student",
            "phone" => "+8801777797141",
            "email" => "student@gmail.com",
            "password" => Hash::make('12345678')
        ]);
        Admin::create([
            'user_id' => $admin->id
        ]);
        Marketer::create([
            'user_id' => $marketer->id
        ]);
        Student::create([
            'user_id' => $student->id
        ]);

    }
}
