<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            [
               'name'=>'Ayam Goreng',
               'price'=> 20000,
                'description'=>'Ayam goreng yang enak dan nikmat',
               'stock'=> 200,
               'img_path'=> "images/15110.jpeg",
            ],
            [
                'name'=>'Mie Goreng',
                'price'=> 15000,
                 'description'=>'Mie Enak dan Gurih',
                'stock'=> 300,
                'img_path'=> "images/6080.jpg",
            ],
        ];
  
        foreach ($product as $key => $value) {
            Products::create($value);
        }
    }
}
