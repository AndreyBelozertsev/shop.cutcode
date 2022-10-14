<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'name' => 'Политика конфиденциальности',
                'title' => 'Политика конфиденциальности',
                'link' => '/privacy-policy'
            ],
            [
                'name' => 'Условия оплаты и возврата денежных средств',
                'title' => 'Условия оплаты и возврата денежных средств',
                'link' => '/refund',
            ],
        ];
        foreach ($pages as $page){
            Page::updateOrCreate(
                [
                    'name' => $page['name'],
                    'link' => $page['link']
                ],
                [
                    'title' => $page['title'] ?? '',
                    'description' => $page['description'] ?? '',
                    'picture' => $page['picture'] ?? ''
                ]
            );
        }
    }
}
