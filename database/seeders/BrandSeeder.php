<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $brands = [
            [
                'title' => 'Steelseries',
                'thumbnail' => '/storage/brands/1.png',
                'is_home_page' => 1
            ],
            [
                'title' => 'Razer',
                'thumbnail' => '/storage/brands/2.png'
            ],
            [
                'title' => 'Logitech',
                'thumbnail' => '/storage/brands/3.png'
            ],
            [
                'title' => 'HyperX',
                'thumbnail' => '/storage/brands/4.png',
                'is_home_page' => 1
            ],
            [
                'title' => 'Playstation',
                'thumbnail' => '/storage/brands/5.png'
            ],
            [
                'title' => 'XBOX',
                'thumbnail' => '/storage/brands/6.png',
                'is_home_page' => 1
            ]
            
        ];
        foreach ($brands as $brand){
            Brand::updateOrCreate(
                [
                    'title' => $brand['title']
                ],
                [
                    'is_home_page' => $brand['is_home_page'] ?? 0,
                    'thumbnail' => $brand['thumbnail'] ?? ''
                ]
            );
        }
    }
}