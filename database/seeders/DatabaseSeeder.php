<?php

namespace Database\Seeders;

use App\Models\MService;
use App\Models\MServiceCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);



        MServiceCategory::insert([
                [
                    'name_service_categori' =>'Gel-X'
                ],
                [
                    'name_service_categori' =>'Builder Gel Overlay'
                ],
                [
                    'name_service_categori' =>'Removal'
                ],
                [
                    'name_service_categori' =>'Other Services'
                ],
        ]);

        MService::insert([
            [
                'name_service' => 'Short',
                'price_service' => 75,
                'm_service_category_id' => 1
            ],
            [
                'name_service' => 'Medium',
                'price_service' => 80,
                'm_service_category_id' => 1
            ],
            [
                'name_service' => 'Fills',
                'price_service' => 85,
                'm_service_category_id' => 1
            ],
            [
                'name_service' => 'Short',
                'price_service' => 55,
                'm_service_category_id' => 2
            ],
            [
                'name_service' => 'Medium',
                'price_service' => 60,
                'm_service_category_id' => 2
            ],
            [
                'name_service' => 'Long',
                'price_service' => 65,
                'm_service_category_id' => 2
            ],
            [
                'name_service' => 'Removal',
                'price_service' => 20,
                'm_service_category_id' => 3
            ],
            [
                'name_service' => 'Removal w/ Set',
                'price_service' => 10,
                'm_service_category_id' => 3
            ],
            [
                'name_service' => 'Foreign Removal',
                'price_service' => 30,
                'm_service_category_id' => 3
            ],
            [
                'name_service' => 'Foreign Removal w/ Set',
                'price_service' => 25,
                'm_service_category_id' => 3
            ],
            [
                'name_service' => 'Basic Gel Manicure',
                'price_service' => 50,
                'm_service_category_id' => 4
            ],
            [
                'name_service' => 'French Manicure',
                'price_service' => 40,
                'm_service_category_id' => 4
            ],
            [
                'name_service' => 'Nail Designs',
                'price_service' => 15,
                'm_service_category_id' => 4
            ],
        ]);
    }
}
