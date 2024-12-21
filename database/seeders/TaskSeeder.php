<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // viet code sinh du lieu fake
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            Task::create([
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'long_description' => $faker->optional()->text(),
                
            ]);
        }

    }
}
