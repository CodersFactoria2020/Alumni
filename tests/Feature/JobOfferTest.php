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
            ]
        );

        $this->assertDatabaseHas('job_offers', [
                'position'=>'Developer', 
                'empresa_id'=> 1,
                'location'=>'BCN',
                'description'=>'holu',
            ]
        );

        $response->assertStatus(201);
    }

    public function test_delete_job_offer() 
    {
        $empresa = factory(Empresa::class, 5)->create();
        $jobOffer = factory(JobOffer::class)->create();

        $this->assertDatabaseHas('job_offers', [
            'id'=>$jobOffer->id,
            'position'=>$jobOffer->position,
            'empresa_id'=>$jobOffer->empresa_id,
            'location'=>$jobOffer->location,
            'description'=>$jobOffer->description
            ]);

        $response = $this->delete('/api/jobOffers/'.$jobOffer->id);

        $this->assertDatabaseMissing('job_offers', [
            'id'=>$jobOffer->id,
            'position'=>$jobOffer->position,
            'empresa_id'=>$jobOffer->empresa_id,
            'location'=>$jobOffer->location,
            'description'=>$jobOffer->description
            ]);
        $response->assertStatus(200);
    }

    public function test_update_job_offer()
    {
        $empresa = factory(Empresa::class, 5)->create();
        $jobOffer = factory(JobOffer::class)->create();

        $updatedJobOffer = [
            'position'=>'Scrum Master'
        ];

        $response = $this->patch('/api/jobOffers/'.$jobOffer->id, $updatedJobOffer);

        $this->assertDatabaseHas('job_offers', [
            'position'=>'Scrum Master'
        ]);
    }

    public function test_show_job_offer_details()
    {
        $empresa = factory(Empresa::class, 5)->create();
        $jobOffer = factory(JobOffer::class)->create();

        $response = $this->get('/empleos/'.$jobOffer->id);

        $response->assertStatus(302);
    }

}
