<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
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
         \App\Models\User::factory(10)->create();
//         \App\Models\Task::factory(100)->create();
//         \App\Models\Task::factory(100)->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);

        $faker = Faker::create();
        $statusValues = ['Todo', 'In progress', 'Done'];
        $startDate = Carbon::now()->startOfYear();
        $endDate = Carbon::now()->endOfYear();
        $now = Carbon::now();

         foreach(range(1,40) as $index){
             $deadline = $faker->dateTimeBetween($startDate, $endDate );
             DB::table('tasks')->insert([
                 'task'=>$faker->text(100),
                 'status'=>$statusValues[rand(0,2)],
                 'user_id'=>rand(1,11),
                 'deadline' => $deadline->format('Y-m-d'),
             ]);
         }
        foreach(range(1,200) as $index){
            $date = $faker->dateTimeBetween($startDate, $now );
            DB::table('comments')->insert([
                'task_id'=>rand(1,40),
                'comment'=>$faker->text(50),
                'user_id'=>rand(1,11),
                'created_at'=>$date->format('Y-m-d'),

            ]);
        }
    }
}
