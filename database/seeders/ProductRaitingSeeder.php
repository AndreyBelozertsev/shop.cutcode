<?php

namespace Database\Seeders;

use App\Models\ProductRaiting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductRaitingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductRaiting::factory()
            ->count(1000)
            ->create();
    }
}
