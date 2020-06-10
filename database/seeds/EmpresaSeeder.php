<?php

use Illuminate\Database\Seeder;
use App\empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Empresa::class, 2)->create();
    }
}
