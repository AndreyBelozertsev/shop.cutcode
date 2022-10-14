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
                'title' => 'Мыши',
                'is_home_page' => 1
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
                'title' => 'Мониторы',
                'is_home_page' => 1
            ],
            [
                'title' => 'Консоли'
            ],
            [
                'title' => 'Акустика'
            ],
            [
                'title' => 'Аксессуары',
                'is_home_page' => 1
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
                    'is_home_page' => $category['is_home_page'] ?? 0,
                    'thumbnail' => $category['title'] ?? ''
                ]
            );
        }
    }
}