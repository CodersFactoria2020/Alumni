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

    public function testBasicTest()
    {
        //
    }
}