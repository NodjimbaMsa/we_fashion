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
        $files_men = Storage::disk('public')->allFiles('images/hommes');
        $files_women = Storage::disk('public')->allFiles('images/femmes');

        $nb_sizes = Size::all()->count();

        $ids = range(1, $nb_sizes);

        Product::factory(80)->create()->each(function ($product) use ($ids, $nb_sizes, $files_men, $files_women) {

			shuffle($ids);
            shuffle($files_men);
            shuffle($files_women);


			$product->sizes()->attach(array_slice($ids, 1, rand(1, $nb_sizes)));

            $product->picture()->create([
				'product_id' => $product->id,
                'path' => ($product->category->name == 'Homme') ? $files_men[0] : $files_women[0],
			]);

			$product->save();

		});
    }
}
