<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\JobOffer;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
   
    public function test_api_job_offer() 
    {
        $response = $this->get('/api/jobOffers');

        $response->assertStatus(200);
    } 

    public function test_add_job_offer_to_api() 
    {
        $jobOffer = factory(JobOffer::class)->make();

        $response = $this->post('/api/jobOffers',[
                'position'=>'Developer', 
             ]);

        $this->assertDatabaseHas('jobOffers', [
                'position'=>'Developer', 
            ]);

        $response->assertStatus(201);
    }
}
