<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\ProductItem;
use App\Models\ProductCategory;
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
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);

        Customer::factory(100)->create();

        ProductCategory::factory()
            ->count(4)
            ->sequence(
                ['name' => 'Uncategorized'],
                ['name' => 'Crowns and Bridges'],
                ['name' => 'Implants'],
                ['name' => 'Removable Prosthodontics'],
            )
            ->create();

        ProductItem::factory()
            ->count(100)
            ->sequence(
                [
                    'name'                => 'Fully Milled Zirconia',
                    'product_category_id' => '2',
                    'turnaround_time'     => '8',
                ],
                [
                    'name'                => 'emax',
                    'product_category_id' => '2',
                    'turnaround_time'     => '8',
                ],
                [
                    'name'                => 'Porcelain Fused to Metal',
                    'product_category_id' => '2',
                    'turnaround_time'     => '9',
                ],
                [
                    'name'                => 'Implant',
                    'product_category_id' => '3',
                    'turnaround_time'     => '12',
                ],
                [
                    'name'                => 'Splint',
                    'product_category_id' => '4',
                    'turnaround_time'     => '9',
                ],
                [
                    'name'                => 'Mouth Guard',
                    'product_category_id' => '4',
                    'turnaround_time'     => '9',
                ],
            )
            ->create();
    }
}
