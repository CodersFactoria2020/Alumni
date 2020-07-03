<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\JobOffer;
use App\Project;
use App\ForumCategory;
use App\Thread;
use App\Post;

class DatabaseSeeder extends Seeder
{
    public function run()
    {   
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(Role_UserSeeder::class);
        $this->call(Permission_RoleSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(JobOfferSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(LanguageSeeder::class);        
        $this->call(CategorySeeder::class);        
        $this->call(ForumCategorySeeder::class);
        //$this->call(ThreadSeeder::class);        
        factory(Thread::class, 10)->create();
        //$this->call(PostSeeder::class);
        factory(Post::class, 50)->create();

        
    }
}