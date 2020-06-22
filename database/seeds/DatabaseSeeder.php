<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\JobOffer;
use App\Project;
use App\ForumCategory;

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
        $this->call(TagSeeder::class);
        $this->call(JobOfferSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(LanguageSeeder::class);        
        $this->call(CategorySeeder::class);        
        //$this->call(ForumCategorySeeder::class);
        factory(ForumCategory::class)->create(['title' => 'General']);
        factory(ForumCategory::class)->create(['title' => 'Empresas']);
        factory(ForumCategory::class)->create(['title' => 'Proyectos']);
        factory(ForumCategory::class)->create(['title' => 'Rincón chill-out']);
        //$this->call(ForumSeeder::class);
        factory(\App\Forum::class, 5)->create();
        //$this->call(ThreadSeeder::class);        
        factory(\App\Thread::class, 5)->create();
        //$this->call(PostSeeder::class);
        factory(\App\Post::class, 50)->create();

        foreach(JobOffer::all() as $jobOffer) {

            foreach(Tag::all() as $tag) {

                if (rand(1, 100) > 70) {
                        $tag->jobOffer()->attach($jobOffer->id);
                }
            }
            $tag->save();
        }

        foreach(Project::all() as $project) {

            foreach(Tag::all() as $tag) {

                if (rand(1, 100) > 70) {
                    $tag->project()->attach($project->id);
                }
             }
             $tag->save();
         }
    }
}