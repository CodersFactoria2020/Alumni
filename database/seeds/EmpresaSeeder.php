<?php

use Illuminate\Database\Seeder;
use App\empresa;

class EmpresaSeeder extends Seeder
{

    public function run()
    {
        factory(Empresa::class, 5)->create();
    }
}
