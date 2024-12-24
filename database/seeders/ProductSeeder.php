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
            [
                'name'       => 'None',
                'short_name' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Crowns and Bridges',
                'short_name' => 'CB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Implants',
                'short_name' => 'IM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Removable Prosthodontics',
                'short_name' => 'RP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
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
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'name'                => 'emax',
                'short_name'          => NULL,
                'product_category_id' => '2',
                'turnaround_time'     => '8',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'name'                => 'emax ZirPress',
                'short_name'          => NULL,
                'product_category_id' => '2',
                'turnaround_time'     => '8',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'name'                => 'Porcelain Fused to Zirconia',
                'short_name'          => 'PFZ',
                'product_category_id' => '2',
                'turnaround_time'     => '8',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'name'                => 'Porcelain Fused to Metal',
                'short_name'          => 'PFM',
                'product_category_id' => '2',
                'turnaround_time'     => '9',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'name'                => 'Full Gold',
                'short_name'          => NULL,
                'product_category_id' => '2',
                'turnaround_time'     => '9',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'name'                => 'Implant',
                'short_name'          => NULL,
                'product_category_id' => '3',
                'turnaround_time'     => '12',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'name'                => 'Splint',
                'short_name'          => NULL,
                'product_category_id' => '4',
                'turnaround_time'     => '9',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
            [
                'name'                => 'Mouth Guard',
                'short_name'          => NULL,
                'product_category_id' => '4',
                'turnaround_time'     => '9',
                'created_at'          => now(),
                'updated_at'          => now(),
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
