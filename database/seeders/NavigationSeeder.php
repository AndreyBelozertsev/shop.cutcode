<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $navigation_items = [
            [
                'title' => 'Главня',
                'link' => '/',
                'sort' => 100,
                'type' => 'top'
            ],
            [
                'title' => 'Каталог товаров',
                'link' => '/products',
                'sort' => 200,
                'type' => 'top'
            ],
            [
                'title' => 'Корзина',
                'link' => '/cart',
                'sort' => 300,
                'type' => 'top'
            ],
        ];
        foreach ($navigation_items as $item){
            Navigation::updateOrCreate(
                [
                    'title' => $item['title'],
                    'link' => $item['link']
                ],
                [
                    'sort' => $item['sort'],
                    'type' => $item['type']
                ]
            );
        }
    }
}
