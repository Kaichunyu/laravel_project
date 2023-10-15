<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(user_typesTableSeeder::class);
        $this->call(usersTableSeeder::class);
        $this->call(projectsTableSeeder::class);        
        $this->call(ApplicationsTableSeeder::class);   
        $this->call(ImagesTableSeeder::class); 
        $this->call(FilesTableSeeder::class); 
        $this->call(rolesTableSeeder::class);
        $this->call(student_profilesTableSeeder::class); 
    }
}
