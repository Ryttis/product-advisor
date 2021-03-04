<?php

namespace Database\Factories;

use App\Models\Product;
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
            'sku' => $this->faker->ean8,
            'name' => $this->faker->sentence(2),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'advisor' => function() {
                $ran = array('clear','isolated-clouds','scattered-clouds',
                'overcast','light-rain','moderate-rain','heavy-rain',
                'sleet','light-snow','moderate-snow','heavy-snow','fog','na');
                $randomElement = $ran[array_rand($ran, 1)];
                return $randomElement;
            }
        ];
    }
}
