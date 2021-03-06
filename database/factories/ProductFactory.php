<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'discount' => $this->faker->randomElement(['solde','defaut']),
            'visibility' => $this->faker->randomElement(['published', 'no_published']),
            'reference' => $this->faker->text(16),
            'category_id' => $this->faker->randomElement(Category::all()),
        ];
    }
}
