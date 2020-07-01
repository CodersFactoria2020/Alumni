<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\JobOffer;
use App\Empresa;
use App\Language;

class JobOfferTest extends TestCase
{
    use RefreshDatabase;
   
    public function test_access_api() 
    {
        $response = $this->get('/api/jobOffers');

        $response->assertStatus(200);
    } 

    public function test_api_returns_job_offer_list() 
    {
        $empresa = factory(Empresa::class, 5)->create();
        $jobOffer = factory(JobOffer::class)->create();

        $response = $this->get('/api/jobOffers');
        $response-> assertJsonCount(1);
    }

    public function test_add_job_offer_to_api() 
    {
        $empresa = factory(Empresa::class)->create();
        $language = factory(Language::class)->create();

        $response = $this->post('/api/jobOffers',[
                'position'=>'Developer', 
                'empresa_id'=>1,
                'location'=>'BCN',
                'description'=>'holu',
                'languages'=> [1]
             ]);

        $this->assertDatabaseHas('job_offers', [
                'position'=>'Developer', 
                'empresa_id'=> 1,
                'location'=>'BCN',
                'description'=>'holu',
            ]);

        $response->assertStatus(201);
    }
}
