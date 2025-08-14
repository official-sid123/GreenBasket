<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; 
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $json=File::get('database/json/product.json');

            $products=collect(json_decode($json));

            $products->each(function($product){
                product::create([
                    'name'=>$product->name,
                    'price'=>$product->price,
                    'description'=>$product->description,
                    'image_url'=>$product->image_url,
                    'is_featured'=>$product->is_featured
                ]);
            });
        
    }
}
