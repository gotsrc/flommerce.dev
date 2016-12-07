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
            'category_id' => '1',
            'title' => 'Super Linux Server',
            'description' => 'Everyone loves a Linux Server.',
            'img_path' => 'linux-server.jpg',
            'price' => '250',
            'sale' => '1',
            'slug' => 'super-linux-server-on-sale'
        ]);
        $product->save();

        $product = new \App\Product([
            'category_id' => '1',
            'title' => 'Super Linux Server',
            'description' => 'Everyone loves a Linux Server.',
            'img_path' => 'linux-server.jpg',
            'price' => '500',
            'sale' => '0',
            'slug' => 'super-linux-server'
        ]);
        $product->save();

        $product = new \App\Product([
            'category_id' => '2',
            'title' => 'Web Development',
            'description' => 'Web Development at a great price. Please note the price is to reflect a per hour charge. This is currently on offer.',
            'img_path' => 'linux-server.jpg',
            'price' => '12.50',
            'sale' => '1',
            'slug' => 'web-development-on-sale'
        ]);
        $product->save();

        $product = new \App\Product([
            'category_id' => '2',
            'title' => 'Web Development',
            'description' => 'Web Development at a great price. Please note the price is to reflect a per hour charge.',
            'img_path' => 'linux-server.jpg',
            'price' => '25',
            'sale' => '0',
            'slug' => 'web-development-not-on-sale'
        ]);
        $product->save();

        $product = new \App\Product([
            'category_id' => '3',
            'title' => 'Linux Server Configuration',
            'description' => 'We will fix your Linux Server, COMPLETELY FREE!!!!',
            'img_path' => 'linux-server.jpg',
            'price' => '0',
            'sale' => '1',
            'slug' => 'linux-server-config-free'
        ]);
        $product->save();

        $product = new \App\Product([
            'category_id' => '3',
            'title' => 'Domain',
            'description' => 'Buy any Linux Server from us and we will include a Domain of your choice for FREE!',
            'img_path' => 'linux-server.jpg',
            'price' => '0',
            'sale' => '0',
            'slug' => 'free-domain'
        ]);
        $product->save();
    }
}
