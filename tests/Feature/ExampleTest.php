<?php
namespace Tests\Feature;
use App\Event;
use App\Profile;
use App\Role;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class UserTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSeeText('Alumni');
    }
    public function test_cant_access_home_without_user()
    {
        $response = $this->get('home');
        $response->assertStatus(302);
        $response->assertRedirect('welcome');
    }
    public function test_access_home_with_user()
    {
        $user = factory(User::class)->make(['access'=>'yes']);
        //dd($user);
        $response = $this->actingAs($user)->post('/profile',['nickname'=>$user->name,
            'aboutme'=>'soy la caña','web'=>'no tengo web','social'=>'insta','user_id'=>$user->id]);
        //dd($response);
        /*$this->assertDatabaseHas('profiles', [
            'nickname' => $user->name
        ]);*/
        $response->assertForbidden();
        $response->assertStatus(403);
    }
    public function test_cant_access_admin_with_student_user()
    {
        $role = factory(Role::class)->create(['id'=>Role::$default, 'slug'=> 'Student','name'=>'Student']);
        $user = factory(User::class)->create(['name'=> 'Alejandrooo Acho','email'=> 'alejo@acho.com'
            , 'password'=> '$10$360nxe4gky0xISfe9vi4JOWWbqrrlnzswAbykcVjBKM5ARZ7yxxDu','access'=>'yes']);
        $response = $this->actingAs($user)->get('admin');
        $response->assertStatus(302);
    }
    public function test_access_admin_with_admin_user()
    {
        $role = factory(Role::class)->create(['id'=>1, 'slug'=> 'Admin','name'=>'Admin']);
        $user = factory(User::class)->create(['name'=> 'Alejandrooo Acho','email'=> 'alejo@acho.com'
            , 'password'=> '$10$360nxe4gky0xISfe9vi4JOWWbqrrlnzswAbykcVjBKM5ARZ7yxxDu','access'=>'yes']);
        $user->roles()->sync($role->id);
        $response = $this->actingAs($user)->get('admin');
        $response->assertStatus(200);
    }
}
