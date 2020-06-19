<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class EmpresaSeeder extends Seeder
{

    public function run()
    {
        factory(Empresa::class, 5)->create();
    }
}
