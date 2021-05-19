<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'id' => '1',
                'name' => 'T-shirt',
                'price' => 100,
                'quantity' => 100,
                'size' => serialize(array("L", "XL", "XXL")),
                'is_stock' => 'instock',
                'color' => 'Red',
            ],
            [
                'id' => '2',
                'name' => 'Shirt',
                'price' => 100,
                'quantity' => 100,
                'size' => serialize(array("L", "XL", "XXL")),
                'is_stock' => 'instock',
                'color' => 'yellow',
            ],
            [
                'id' => '3',
                'name' => 'Hood',
                'price' => 100,
                'quantity' => 100,
                'size' => serialize(array("L", "XL", "XXL")),
                'is_stock' => 'ouofstock',
                'color' => 'Black',
            ],
        ];

        Product::insert($products);
    }
}
