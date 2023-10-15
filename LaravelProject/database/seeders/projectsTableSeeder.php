<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $projects = [
            ['title' => 'project1', 'description' => 'description1', 'number_of_student_needed' => '3', 'offering_trimester' => '1', 'offering_year' => '2023', 'user_id' => '1'],
            ['title' => 'project2', 'description' => 'description2', 'number_of_student_needed' => '3', 'offering_trimester' => '2', 'offering_year' => '2023', 'user_id' => '2'],
            ['title' => 'project3', 'description' => 'description3', 'number_of_student_needed' => '4', 'offering_trimester' => '3', 'offering_year' => '2023', 'user_id' => '3'],
            ['title' => 'project4', 'description' => 'description4', 'number_of_student_needed' => '4', 'offering_trimester' => '1', 'offering_year' => '2023', 'user_id' => '4'],
            ['title' => 'project5', 'description' => 'description5', 'number_of_student_needed' => '5', 'offering_trimester' => '2', 'offering_year' => '2023', 'user_id' => '5'],
            ['title' => 'project6', 'description' => 'description6', 'number_of_student_needed' => '5', 'offering_trimester' => '3', 'offering_year' => '2023', 'user_id' => '6'],
            ['title' => 'project7', 'description' => 'description7', 'number_of_student_needed' => '5', 'offering_trimester' => '1', 'offering_year' => '2023', 'user_id' => '7'],
            ['title' => 'project8', 'description' => 'description8', 'number_of_student_needed' => '6', 'offering_trimester' => '2', 'offering_year' => '2023', 'user_id' => '8'],
            ['title' => 'project9', 'description' => 'description9', 'number_of_student_needed' => '6', 'offering_trimester' => '3', 'offering_year' => '2023', 'user_id' => '9'],
            ['title' => 'project10', 'description' => 'description10', 'number_of_student_needed' => '6', 'offering_trimester' => '1', 'offering_year' => '2023', 'user_id' => '10'],

        ];


        foreach ($projects as $project){
            DB::table('projects')->insert([
                'title' => $project['title'],
                'description' => $project['description'],
                'number_of_student_needed' => $project['number_of_student_needed'],
                'offering_trimester' => $project['offering_trimester'],
                'offering_year' => $project['offering_year'],
                'user_id' => $project['user_id'],
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),

            ]);
        };


        // \App\Models\User::factory()->count(5)->create();
        \App\Models\Project::factory()->count(5)->create();

    }
}
