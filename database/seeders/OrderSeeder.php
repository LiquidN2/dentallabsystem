<?php

namespace Database\Seeders;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function seedOrders(): void
    {
        $data = [
            [
                'order_number'    => '123456789',
                'customer_id'     => 1,
                'dentist'         => 'Dr John Doe',
                'patient'         => 'Jane Brown',
                'product_item_id' => 1,
                'digital'         => true,
                'created_at'      => now(),
                'updated_at'      => now(),
            ]
        ];

        Order::insert($data);
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $this->seedOrders();
    }
}
