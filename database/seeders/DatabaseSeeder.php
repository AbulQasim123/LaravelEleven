<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Contact;
use App\Models\Student;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $faker = Faker::create();
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // // Seed students table
        // foreach (range(1, 10) as $index) {
        //     $studentId = DB::table('students')->insertGetId([
        //         'name' => $faker->name,
        //         'age' => $faker->numberBetween(18, 25),
        //         'gender' => $faker->randomElement(['male', 'female']),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);

        //     // Seed contacts table
        //     DB::table('contacts')->insert([
        //         'email' => $faker->email,
        //         'student_id' => $studentId,
        //         'phone' => $faker->phoneNumber,
        //         'address' => $faker->address,
        //         'city' => $faker->city,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // foreach (range(1, 5) as $index) {
        //     $userId = DB::table('users')->insertGetId([
        //         'name' => $faker->name,
        //         'email' => $faker->email(),
        //         'password' => $faker->password(),
        //         'created_at' => now(),
        //         'updated_at' => now(),

        //     ]);

        //     DB::table('posts')->insert([
        //         'title' => $faker->title(),
        //         'description' => $faker->sentence(),
        //         'user_id' => $userId,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'type' => 2,
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'type' => 1,
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
