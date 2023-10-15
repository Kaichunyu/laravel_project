<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('user_types')->insert([
            'name' => 'Industry Partner',
            
        ]);

        DB::table('user_types')->insert([
            'name' => 'Student',
            
        ]);

        DB::table('user_types')->insert([
            'name' => 'Teacher',
            
        ]);

    }
}
