<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();
        for ($i=0; $i < 15; $i++) {

            $randomType = Type::inRandomOrder()->first();
            Project::create([
                'title' => fake()->word(),
                'description' =>fake()->paragraph(),
                'languages' =>fake()->words(rand(1, 4), true),
                'completed' =>fake()->boolean(70),
                'starting_date' =>fake()->dateTimeBetween('-1 week', '+1 week'),
                'level'=>fake()->word(),
                'type_id'=> $randomType->id,
            ]);
        }
    }
}
