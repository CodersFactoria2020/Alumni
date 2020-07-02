<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\Seeder;
use Tests\TestCase;
use App\User;
use App\Role;

class ProfileTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    public function test_without_login_cant_acces_to_profile_list()
    {
        $response = $this->get('/profile');

        $response->assertRedirect('/');
    }

    public function test_user_logged_in_with_access_can_acces_to_profile_list()
    {             
        $this->artisan('db:seed');
        //factory(Role::class)->create(['id'=>Role::$default,'name'=>'Student', 'slug'=>'student', 'description'=>'Alumnis student.', 'full-access'=>'no']);    
        $user = factory(User::class)->create(['name'=>'Alexacho','email'=>'alejo@gmail.com', 'password'=>'$10$360nxe4gky0xISfe9vi4JOWWbqrrlnzswAbykcVjBKM5ARZ7yxxDu','access'=>'yes']);
        $response = $this->actingAs($user)->get('/profile');
        //dd($user->roles);
        $response->assertStatus(200);
    }

    public function test_user_logged_in_without_access_cant_acces_to_profile_list()
    {             
        $this->artisan('db:seed');

        $user = factory(User::class)->create(['name'=>'Alexacho','email'=>'alejo@gmail.com', 'password'=>'$10$360nxe4gky0xISfe9vi4JOWWbqrrlnzswAbykcVjBKM5ARZ7yxxDu','access'=>'no']);

        $response = $this->actingAs($user)->get('/profile');
        $response->assertRedirect('/warning');
    }
}
