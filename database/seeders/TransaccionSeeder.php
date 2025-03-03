<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaccion;

class TransaccionSeeder extends Seeder
{
    public function run()
    {
        Transaccion::factory(15)->create();
    }
}
