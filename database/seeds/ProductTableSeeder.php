<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath' => 'https://prodimage.images-bn.com/pimages/9780545790352_p0_v25_s550x406.jpg',
            'title' => 'Harry Potter',
            'description' => 'Super Cool as a child',
            'price' => 10
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath' => 'https://prodimage.images-bn.com/pimages/9780545790352_p0_v25_s550x406.jpg',
            'title' => 'Book 2',
            'description' => 'Super Cool as a child',
            'price' => 15
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath' => 'https://prodimage.images-bn.com/pimages/9780545790352_p0_v25_s550x406.jpg',
            'title' => 'Book 3',
            'description' => 'Super Cool as a child',
            'price' => 20
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath' => 'https://prodimage.images-bn.com/pimages/9780545790352_p0_v25_s550x406.jpg',
            'title' => 'Book 4',
            'description' => 'Super Cool as a child',
            'price' => 25
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath' => 'https://prodimage.images-bn.com/pimages/9780545790352_p0_v25_s550x406.jpg',
            'title' => 'Book5',
            'description' => 'Super Cool as a child',
            'price' => 30
        ]);
        $product->save();
    }
}
