<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Project;
use App\Language;


class ProjectTest extends TestCase
{
    use RefreshDatabase;
    public function test_access_api() 
    {
        $response = $this->get('/api/projects');

        $response->assertStatus(200);
    }
    public function test_api_returns_projects_list() 
    {
        $project = factory(Project::class)->create();
      
        $response = $this->get('/api/projects');
        $response-> assertJsonCount(1);
    }
    public function test_add_project_to_api() 
    {
        $language = factory(Language::class)->create();
        
        $response = $this->post('/api/projects',[
                'title'=>'Projectname', 
                'description'=>'holaaa',
                'repository'=>'abc',
                'status'=> 'In progress',
                'username'=> 'Umit',
                'email'=> 'umit@submit.com',
                'languages'=> [1]
            ]
        );
        $this->assertDatabaseHas('projects', [
                'title'=>'Projectname', 
                'description'=>'holaaa',
                'repository'=>'abc',
                'status'=> 'In progress',
                'username'=> 'Umit',
                'email'=> 'umit@submit.com'
            ]
        );
        $response->assertStatus(201);
    }
    public function test_delete_project() 
    {
        $project = factory(Project::class)->create();

        $this->assertDatabaseHas('projects', [
            'id'=>$project->id,
            ]);
        $response = $this->delete('/api/projects/'.$project->id);

        $this->assertDatabaseMissing('projects', [
            'id'=>$project->id
            ]);

        $response->assertStatus(200);
    }
    public function test_update_project()
    {
        $project = factory(Project::class)->create();
        
        $updatedProject = [
            'title'=>'Scrum Project'
        ];
        $response = $this->patch('/api/projects/'.$project->id, $updatedProject);
        $this->assertDatabaseHas('projects', [
            'title'=>'Scrum Project'
        ]);
    }
    public function test_show_projects_details()
    {
        $project = factory(Project::class)->create();

        $response = $this->get('/proyectos/'.$project->id);
        
        $response->assertStatus(302);
        // $response->assertRedirect('/proyectos', $project->id);
    }
}
