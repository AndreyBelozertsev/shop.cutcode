<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'Мыши'
            ],
            [
                'title' => 'Клавиатуры'
            ],
            [
                'title' => 'Наушники'
            ],
            [
                'title' => 'Поверхности'
            ],
            [
                'title' => 'Мониторы'
            ],
            [
                'title' => 'Консоли'
            ],
            [
                'title' => 'Акустика'
            ],
            [
                'title' => 'Аксессуары'
            ],
            [
                'title' => 'Распродажа'
            ]
            
        ];
        foreach ($categories as $category){
            Category::updateOrCreate(
                [
                    'title' => $category['title']
                ],
                [
                    'thumbnail' => $category['title'] ?? ''
                ]
            );
        }
    }
}