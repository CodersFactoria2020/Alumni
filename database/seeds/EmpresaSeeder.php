<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class EmpresaSeeder extends Seeder
{
    public function run()
    {
        //factory(Empresa::class,5)->create();
        factory(Empresa::class)->create(['name' => 'ThoughtWorks']);
        factory(Empresa::class)->create(['name' => 'Idealista']);
        factory(Empresa::class)->create(['name' => 'Basetis']);
        factory(Empresa::class)->create(['name' => 'IBM']);
        factory(Empresa::class)->create(['name' => 'Google']);
        factory(Empresa::class)->create(['name' => 'Facebook']);
        factory(Empresa::class)->create(['name' => 'Amazon']);
        factory(Empresa::class)->create(['name' => 'Microsoft']);
        factory(Empresa::class)->create(['name' => 'Apple']);
    }
}