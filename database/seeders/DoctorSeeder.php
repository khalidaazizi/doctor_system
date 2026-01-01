<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        // ابتدا پاک کردن رکورد قبلی داکتر با ایمیل مشابه
        DB::table('users')->where('email', 'doctor@example.com')->delete();

        // ایجاد داکتر
        DB::table('users')->insert([
            'name' => 'Dr. Ahmad Habibi',
            'email' => 'doctor@example.com',
            'password' => Hash::make('password123'), // رمز عبور هَش شده
            'role' => 'doctor', // اگر جدول role ندارد، این را اضافه کن
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
