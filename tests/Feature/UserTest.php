<?php
namespace Tests\Feature;

use App\Event;
use App\Profile;
use App\Role;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

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

        $response = $this->actingAs($user)->post('/profile',['nickname'=>$user->name,
            'aboutme'=>'soy la caña','web'=>'no tengo web','social'=>'insta','user_id'=>$user->id]);

        $response->assertForbidden();
        $response->assertStatus(403);
    }
    public function test_cant_access_admin_with_student_user()
    {
        $role = factory(Role::class)->create(['id'=>3, 'slug'=> 'Student','name'=>'Student']);
        $user = factory(User::class)->create(['id'=>20,'name'=> 'Mounir el imlahi','email'=> 'mounir@factoriaf5.com'
            , 'password'=> '$10$360nxe4gky0xISfe9vi4JOWWbqrrlnzswAbykcVjBKM5ARZ7yxxDu','access'=>'yes']);
        $this->assertDatabaseHas('users', [
            'name' => $user->name
        ]);
        $user->roles()->sync($role->id);
        $response = $this->actingAs($user)->get('admin');
        $response->assertStatus(302);
    }

    public function test_access_user_dashboard_with_student_user()
    {
        $role = factory(Role::class)->create(['id'=>3, 'slug'=> 'Student','name'=>'Student']);
        $user = factory(User::class)->create(['id'=>20,'name'=> 'Mounir el imlahi','email'=> 'mounir@factoriaf5.com'
            , 'password'=> '$10$360nxe4gky0xISfe9vi4JOWWbqrrlnzswAbykcVjBKM5ARZ7yxxDu','access'=>'yes']);
        $this->assertDatabaseHas('users', [
            'name' => $user->name
        ]);
        $user->roles()->sync($role->id);
        $response = $this->actingAs($user)->get('dashboard');
        $response->assertStatus(200);
    }

    public function test_cant_access_user_with_student_user()
    {
        $role = factory(Role::class)->create(['id'=>3, 'slug'=> 'Student','name'=>'Student']);
        $user = factory(User::class)->create(['id'=>20,'name'=> 'Mounir el imlahi','email'=> 'mounir@factoriaf5.com'
            , 'password'=> '$10$360nxe4gky0xISfe9vi4JOWWbqrrlnzswAbykcVjBKM5ARZ7yxxDu','access'=>'yes']);
        $this->assertDatabaseHas('users', [
            'name' => $user->name
        ]);
        $user->roles()->sync($role->id);
        $response = $this->actingAs($user)->get('user');
        $response->assertForbidden();
        $response->assertSeeText('This action is unauthorized');
        $response->assertStatus(403);
    }

    public function test_access_profile_with_student_user()
    {
        factory(\App\Permission::class)->create(['name'=>'Ver perfiles', 'slug'=>'profile.index', 'description'=>'Con este permiso podrá ver todos los perfiles.']);

        $role = factory(Role::class)->create(['id'=>Role::$default, 'slug'=> 'Student','name'=>'Student','full-access'=>'no']);
        $user = factory(User::class)->create(['access'=>'yes']);
        $role->permissions()->sync([1]);


        $response = $this->actingAs($user)->get(route('profile.index'));

        $response->assertStatus(200);
    }
    public function test_access_admin_with_admin_user()
    {
        $roleAdmin = factory(Role::class)->create(['id'=>1, 'slug'=> 'Admin','name'=>'Admin', 'full-access'=>'yes']);
        $roleStudent = factory(Role::class)->create(['id'=>3, 'slug'=> 'Student','name'=>'Student', 'full-access'=>'no']);
        $user = factory(User::class)->create(['name'=> 'Alejandrooo Acho','email'=> 'alejo@acho.com'
            , 'password'=> '$10$360nxe4gky0xISfe9vi4JOWWbqrrlnzswAbykcVjBKM5ARZ7yxxDu','access'=>'yes']);

        $this->assertDatabaseHas('users', [
            'name' => $user->name
        ]);
        $user->roles()->sync($roleAdmin->id);
        //dd($user->roles);
        $response = $this->actingAs($user)->get('admin');
        $response->assertStatus(200);
    }
    public function test_admin_can_edit_a_user()
    {
        $roleAdmin = factory(Role::class)->create(['id'=>1, 'slug'=> 'Admin','name'=>'Admin', 'full-access'=>'yes']);
        $roleStudent = factory(Role::class)->create(['id'=>3, 'slug'=> 'Student','name'=>'Student', 'full-access'=>'no']);
        $user = factory(User::class)->create(['name'=> 'Alejandrooo Acho','email'=> 'alejo@acho.com'
            , 'password'=> '$10$360nxe4gky0xISfe9vi4JOWWbqrrlnzswAbykcVjBKM5ARZ7yxxDu','access'=>'yes']);

        $user->roles()->sync($roleAdmin->id);

        $response = $this->actingAs($user)->putJson('user/'.$user->id, ['name' =>'Alejandro Acho']);
        $this->assertDatabaseHas('users',
            ['name' => 'Alejandro Acho']
        );

        $response->assertRedirect('user');
        $response->assertStatus(302);
    }

    public function test_role_admin_can_delete_user()
    {
        factory(\App\Permission::class)->create(['name'=>'Eliminar usuario', 'slug'=>'user.destroy', 'description'=>'Con este permiso podrá eliminar todos los usuarios.']);
        $role = factory(Role::class)->create(['id'=>1, 'slug'=> 'Admin','name'=>'Admin', 'full-access'=>'yes']);
        $roleStudent = factory(Role::class)->create(['id'=>Role::$default, 'slug'=> 'Student','name'=>'Student', 'full-access'=>'no']);
        $user = factory(User::class)->create(['name'=> 'Mounir','email'=> 'mounir@test.com'
            , 'password'=> '$10$360nxe4gky0xISfe9vi4JOWWbqrrlnzswAbykcVjBKM5ARZ7yxxDu','access'=>'yes']);
        $new_user = factory(User::class)->create(['name'=>'Marc', 'email'=> 'marc@test.com', 'access'=>'yes']);
        $user->roles()->sync($role->id);
        $response = $this->actingAs($user)->delete('user/'.$new_user->id);
        $this->assertDatabaseMissing('users', ['name' =>'Marc']);
        $response->assertRedirect('user');
    }
}

