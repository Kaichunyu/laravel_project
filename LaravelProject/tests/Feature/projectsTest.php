<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class projectsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function testInputVailation()
    {
        $response = $this->post('/project/create', [
            'title' => '',
            'description' => '23',
            'number_of_student_needed' => '1',
            'offering_trimester' => '1',
            'offering_year' => '2019',
            'user_id' => '1',

        ]);

        $response->assertSessionHasErrors(['title', 'description', 'number_of_student_needed']);
        

    }

    public function testStoreRecord()
    {

        $response = $this->post('/project/create', [
            'title' => 'project1',
            'description' => 'description1',
            'number_of_student_needed' => '3',
            'offering_trimester' => '1',
            'offering_year' => '2023',
            'user_id' => '1',

        ]);
        
        $this->assertDatabaseHas('projects', [
            'title' => 'project1'
        ]);

        
    }


    public function testDeletion()
    {

        $project = Project::factory()->create();

        // Send a DELETE request to the project deletion route
        $response = $this->delete("/project/{$project->id}");
        
        $response->assertStatus(302); // Redirect status code

        
    }


    public function testDeletionFail()
    {

        $project = Project::factory()->create();

        // Send a DELETE request to the project deletion route
        $response = $this->delete("/project/{$project->id}");
        
        $response->assertSessionHasErrors(['delete']);;

        
    }

}