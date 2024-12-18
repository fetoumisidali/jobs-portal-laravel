<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user =  User::factory()->create([
            'username' => 'SidaliUser',
            'email' => 'sidali@user.com',
        ]);
        User::factory()->create([
            'username' => 'JohnDoe',
            'email' => 'john@user.com',
        ]);

        $users = User::factory()->count(10)->create();
        $job = Job::factory()->create(["user_id" => $user->id]);

        foreach ($users as $user){
            $job->applicants()->create(
                ["user_id"=> $user->id,
                    "full_name" => $user->username,
                    "email" => $user->email,
                    "message" => "this is message created using seeder",
                    "phone_number" => "07871671246"
            ]);
        }



    }
}
