<?php

namespace Tests\Feature;

use App\Event;
use App\User;
use App\Profile;
use App\Role;
use App\Permission;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;


    public function test_cant_access_user_with_user()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/user');

        $response->assertForbidden();
        $response->assertSeeText('This action is unauthorized');
    }

    public function test_can_create_my_profile_as_student()
    {
        $role = factory(Role::class)->create(['id'=>Role::$default, 'slug'=> 'Student','name'=>'Student']);
        $user = factory(User::class)->create(['id' => '4']);

        $this->assertDatabaseHas('profiles',['user_id'=>$user->id]);

    }

    public function test_create_new_user_has_default_profile_student()
    {
        $role = factory(Role::class)->create(['id'=>Role::$default, 'slug'=> 'Student','name'=>'Student']);
        $user = factory(User::class)->create(['id' => '4']);

        $response = $this->actingAs($user)->get('/profile');

        $response->assertStatus(403);
    }

}


