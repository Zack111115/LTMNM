<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Category::factory()
            ->count(5)
            ->hasProducts(10)
            ->create();
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(StudentCourseSeeder::class);

        // Tạo một User kèm theo Profile
        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $user->profile()->create([
            'address' => '140 Lê Trọng Tấn, Tây Thạnh, Tân Phú',
            'phone' => '0901234567'
    ]);
    }
}
