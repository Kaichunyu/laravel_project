<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $applications = [
            ['justification' => 'abc', 'user_id' => 11, 'project_id' => 1],
            ['justification' => 'abcd', 'user_id' => 12, 'project_id' => 2],
            ['justification' => 'abcde', 'user_id' => 13, 'project_id' => 3],
            ['justification' => 'abcdef', 'user_id' => 14, 'project_id' => 4],
            ['justification' => 'abcdefg', 'user_id' => 15, 'project_id' => 5],
            ['justification' => 'abcdefgh', 'user_id' => 16, 'project_id' => 6],
            ['justification' => 'abcdefghj', 'user_id' => 17, 'project_id' => 7],
        ];

        foreach ($applications as $application){
            DB::table('applications')->insert([
                'justification' => $application['justification'],
                'user_id' => $application['user_id'],
                'project_id' => $application['project_id'],
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),

            ]);
        };
    }
}
