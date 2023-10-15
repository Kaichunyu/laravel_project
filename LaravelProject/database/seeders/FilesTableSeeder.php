<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // \App\Models\File::factory()->count(10)->create();

        DB::table('files')->insert([
            'file_path' => 'projects_files/default.pdf',
            'project_id' => 1,
        ]);
        
        DB::table('files')->insert([
            'file_path' => 'projects_files/default1.png', 
            'project_id' => 1,
            
        ]);
    }
}
