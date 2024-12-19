<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use App\Models\ProductItem;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function seedCategories(): void
    {
        $data = [
            ['name' => 'None'],
            ['name' => 'Crowns and Bridges'],
            ['name' => 'Implants'],
            ['name' => 'Removable Prosthodontics'],
        ];

        ProductCategory::insert($data);
    }

    public function seedItems(): void
    {
        $data = [
            [
                'name'                => 'Fully Milled Zirconia',
                'short_name'          => 'FMZ',
                'product_category_id' => '2',
                'turnaround_time'     => '8',
            ],
            [
                'name'                => 'emax',
                'short_name'          => NULL,
                'product_category_id' => '2',
                'turnaround_time'     => '8',
            ],
            [
                'name'                => 'emax ZirPress',
                'short_name'          => NULL,
                'product_category_id' => '2',
                'turnaround_time'     => '8',
            ],
            [
                'name'                => 'Porcelain Fused to Zirconia',
                'short_name'          => 'PFZ',
                'product_category_id' => '2',
                'turnaround_time'     => '8',
            ],
            [
                'name'                => 'Porcelain Fused to Metal',
                'short_name'          => 'PFM',
                'product_category_id' => '2',
                'turnaround_time'     => '9',
            ],
            [
                'name'                => 'Full Gold',
                'short_name'          => NULL,
                'product_category_id' => '2',
                'turnaround_time'     => '9',
            ],
            [
                'name'                => 'Implant',
                'short_name'          => NULL,
                'product_category_id' => '3',
                'turnaround_time'     => '12',
            ],
            [
                'name'                => 'Splint',
                'short_name'          => NULL,
                'product_category_id' => '4',
                'turnaround_time'     => '9',
            ],
            [
                'name'                => 'Mouth Guard',
                'short_name'          => NULL,
                'product_category_id' => '4',
                'turnaround_time'     => '9',
            ],
        ];

        ProductItem::insert($data);
    }

    public function run(): void
    {
        $this->seedCategories();
        $this->seedItems();
    }
}
