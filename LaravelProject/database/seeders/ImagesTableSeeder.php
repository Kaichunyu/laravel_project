<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // \App\Models\Image::factory()->count(5)->create();


        DB::table('images')->insert([
            'image_path' => 'projects_images/default.png', 
            'project_id' => 1,
            
        ]);

        DB::table('images')->insert([
            'image_path' => 'projects_images/default1.png', 
            'project_id' => 1,
            
        ]);
    }
}
