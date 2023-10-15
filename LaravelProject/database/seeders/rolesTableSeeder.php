<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = [
            ['name' => 'software developer'],
            ['name' => 'project manager'],
            ['name' => 'business analyst'],
            ['name' => 'tester'],
            ['name' => 'client liaison']

        ];

        foreach ($roles as $role){
            DB::table('roles')->insert([
                'name' => $role['name'],
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),

            ]);
        };
    }
}
