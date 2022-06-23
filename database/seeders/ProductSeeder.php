<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Picture;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = Storage::disk('public')->allFiles('images/');
        foreach($files as $path){
            echo $path . PHP_EOL;
        }

        $nb_category = Category::all()->count();
        $nb_sizes = Size::all()->count();

        $ids = range(1, $nb_sizes);

        Product::factory(80)->create()->each(function ($product) use ($ids, $nb_category, $nb_sizes) {
			shuffle($ids);
			$product->size()->attach(array_slice($ids, 0, rand(1, $nb_sizes)));

			$category = Category::find(rand(1, $nb_category));
			$product->category()->associate($category);

			$product->save();

		});
    }
}
