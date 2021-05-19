<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = [
            [
                'id' => '1',
                'product_id' => '1',
                'image' => 'image1.jpg',
            ],
            [
                'id' => '2',
                'product_id' => '1',
                'image' => 'image2.jpg',
            ],
            [
                'id' => '3',
                'product_id' => '2',
                'image' => 'image3.jpg',
            ],
        ];

        ProductImage::insert($image);
    }
}
