<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\JobOffer;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
<<<<<<< HEAD
        
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(Role_UserSeeder::class);
        $this->call(Permission_RoleSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(JobOfferSeeder::class);


        foreach(JobOffer::all() as $jobOffer) {

          foreach(Tag::all() as $tag) {

            if (rand(1, 100) > 70) {
                     $tag->jobOffer()->attach($jobOffer->id);
                }
             }
             $tag->save();
         }
=======
<<<<<<< HEAD
        $this->call(LanguageSeeder::class);
=======
        // $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
>>>>>>> CrudCategoria
>>>>>>> Frontend
    }
}
