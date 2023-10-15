<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $users = [
            ['name' => 'InP1', 'email' => 'inp1@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 1, 'approval_status' => 'Yes'],
            ['name' => 'InP2', 'email' => 'inp2@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 1, 'approval_status' => 'Yes'],
            ['name' => 'InP3', 'email' => 'inp3@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 1, 'approval_status' => 'Yes'],
            ['name' => 'InP4', 'email' => 'inp4@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 1, 'approval_status' => 'Yes'],
            ['name' => 'InP5', 'email' => 'inp5@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 1, 'approval_status' => 'Yes'],
            ['name' => 'InP6', 'email' => 'inp6@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 1, 'approval_status' => 'No'],
            ['name' => 'InP7', 'email' => 'inp7@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 1, 'approval_status' => 'No'],
            ['name' => 'InP8', 'email' => 'inp8@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 1, 'approval_status' => 'No'],
            ['name' => 'InP9', 'email' => 'inp9@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 1, 'approval_status' => 'No'],
            ['name' => 'InP10', 'email' => 'inp10@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 1, 'approval_status' => 'No'],
            ['name' => 'student1', 'email' => 'student1@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 2, 'approval_status' => 'No'],
            ['name' => 'student2', 'email' => 'student2@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 2, 'approval_status' => 'No'],
            ['name' => 'student3', 'email' => 'student3@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 2, 'approval_status' => 'No'],
            ['name' => 'student4', 'email' => 'student4@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 2, 'approval_status' => 'No'],
            ['name' => 'student5', 'email' => 'student5@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 2, 'approval_status' => 'No'],
            ['name' => 'student6', 'email' => 'student6@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 2, 'approval_status' => 'No'],
            ['name' => 'student7', 'email' => 'student7@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 2, 'approval_status' => 'No'],
            ['name' => 'student8', 'email' => 'student8@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 2, 'approval_status' => 'No'],
            ['name' => 'student9', 'email' => 'student9@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 2, 'approval_status' => 'No'],
            ['name' => 'student10', 'email' => 'student10@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 2, 'approval_status' => 'No'],
            ['name' => 'teacher', 'email' => 'teacher@gmail.com', 'password' => bcrypt('12345678'), 'user_type_id' => 3, 'approval_status' => 'No'],


        ];

        foreach ($users as $user){
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'user_type_id' => $user['user_type_id'],
                'approval_status' => $user['approval_status'],
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),

            ]);
        };
    }
}
