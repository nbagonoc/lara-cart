<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'name' => 'Apple - iPhoneX',
            'price' => 999,
            'status' => 'available',
            'category' => 'phones',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A laboriosam fugiat nisi. Enim laudantium necessitatibus voluptatibus. Quaerat ut impedit error? Quasi ducimus neque magni perspiciatis iure consectetur praesentium ex est?',
            'imgPath' => 'default.png'
        ]);
        $product->save();

        $product = new \App\Product([
            'name' => 'Samsung - Galaxy S9',
            'price' => 799,
            'status' => 'available',
            'category' => 'phones',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A laboriosam fugiat nisi. Enim laudantium necessitatibus voluptatibus. Quaerat ut impedit error? Quasi ducimus neque magni perspiciatis iure consectetur praesentium ex est?',
            'imgPath' => 'default.png'
        ]);
        $product->save();

        $product = new \App\Product([
            'name' => 'JBL - Headphones',
            'price' => 199,
            'status' => 'out-of-stock',
            'category' => 'others',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A laboriosam fugiat nisi. Enim laudantium necessitatibus voluptatibus. Quaerat ut impedit error? Quasi ducimus neque magni perspiciatis iure consectetur praesentium ex est?',
            'imgPath' => 'default.png'
        ]);
        $product->save();

        $product = new \App\Product([
            'name' => 'Apple - iPad',
            'price' => 399,
            'status' => 'available',
            'category' => 'tablets',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A laboriosam fugiat nisi. Enim laudantium necessitatibus voluptatibus. Quaerat ut impedit error? Quasi ducimus neque magni perspiciatis iure consectetur praesentium ex est?',
            'imgPath' => 'default.png'
        ]);
        $product->save();

        $product = new \App\Product([
            'name' => 'Fujifilm - x30',
            'price' => 599,
            'status' => 'available',
            'category' => 'cameras',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A laboriosam fugiat nisi. Enim laudantium necessitatibus voluptatibus. Quaerat ut impedit error? Quasi ducimus neque magni perspiciatis iure consectetur praesentium ex est?',
            'imgPath' => 'default.png'
        ]);
        $product->save();

        $product = new \App\Product([
            'name' => 'JBL - Speaker',
            'price' => 199,
            'status' => 'out-of-stock',
            'category' => 'others',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A laboriosam fugiat nisi. Enim laudantium necessitatibus voluptatibus. Quaerat ut impedit error? Quasi ducimus neque magni perspiciatis iure consectetur praesentium ex est?',
            'imgPath' => 'default.png'
        ]);
        $product->save();

        $product = new \App\Product([
            'name' => 'Canon - 6D',
            'price' => 1999,
            'status' => 'available',
            'category' => 'cameras',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A laboriosam fugiat nisi. Enim laudantium necessitatibus voluptatibus. Quaerat ut impedit error? Quasi ducimus neque magni perspiciatis iure consectetur praesentium ex est?',
            'imgPath' => 'default.png'
        ]);
        $product->save();

        $product = new \App\Product([
            'name' => 'JBL - Headphone',
            'price' => 199,
            'status' => 'available',
            'category' => 'others',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A laboriosam fugiat nisi. Enim laudantium necessitatibus voluptatibus. Quaerat ut impedit error? Quasi ducimus neque magni perspiciatis iure consectetur praesentium ex est?',
            'imgPath' => 'default.png'
        ]);
        $product->save();

        $product = new \App\Product([
            'name' => 'Apple - Macbook Pro',
            'price' => 1999,
            'status' => 'available',
            'category' => 'computers',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A laboriosam fugiat nisi. Enim laudantium necessitatibus voluptatibus. Quaerat ut impedit error? Quasi ducimus neque magni perspiciatis iure consectetur praesentium ex est?',
            'imgPath' => 'default.png'
        ]);
        $product->save();

        $product = new \App\Product([
            'name' => 'Bose - Speaker',
            'price' => 299,
            'status' => 'available',
            'category' => 'others',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A laboriosam fugiat nisi. Enim laudantium necessitatibus voluptatibus. Quaerat ut impedit error? Quasi ducimus neque magni perspiciatis iure consectetur praesentium ex est?',
            'imgPath' => 'default.png'
        ]);
        $product->save();

        $product = new \App\Product([
            'name' => 'Sony - A7',
            'price' => 1999,
            'status' => 'available',
            'category' => 'cameras',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A laboriosam fugiat nisi. Enim laudantium necessitatibus voluptatibus. Quaerat ut impedit error? Quasi ducimus neque magni perspiciatis iure consectetur praesentium ex est?',
            'imgPath' => 'default.png'
        ]);
        $product->save();
    }
}
