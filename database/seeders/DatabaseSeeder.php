<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory(10)->create();
//         \App\Models\Task::factory(100)->create();



//         \App\Models\Task::factory(100)->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);
         $faker = Faker::create();
        $statusValues = ['Todo', 'In progress', 'Done'];
         foreach(range(1,30) as $index){
             DB::table('tasks')->insert([
                 'task'=>$faker->text(100),
                 'status'=>$statusValues[rand(0,2)],
                 'user_id'=>rand(1,11),
             ]);
         }

    }
}
