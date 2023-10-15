<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class student_profilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $student_profiles = [
            ['grade_point_average' => '4.0', 'user_id' => 11],
            ['grade_point_average' => '4.5', 'user_id' => 12],
            ['grade_point_average' => '5.5', 'user_id' => 13],
            ['grade_point_average' => '6.0', 'user_id' => 14],
            ['grade_point_average' => '7.0', 'user_id' => 15],
            ['grade_point_average' => '6.5', 'user_id' => 16],
            ['grade_point_average' => '6.25', 'user_id' => 17],
            ['grade_point_average' => '6.0', 'user_id' => 18],
            ['grade_point_average' => '4.5', 'user_id' => 19],
            ['grade_point_average' => '4.0', 'user_id' => 20],

        ];

        foreach ($student_profiles as $student_profile){
            DB::table('student_profiles')->insert([
                'grade_point_average' => $student_profile['grade_point_average'],
                'user_id' => $student_profile['user_id'],
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),

            ]);
        };
    }
}
