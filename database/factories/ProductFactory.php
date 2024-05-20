<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $categories = ['Snack', 'Drink', 'Food'];
        $category = $this->faker->randomElement($categories);

        // Daftar merek Laptop
        $snackBrands = [
            'Chitato',
            'Potabee',
            'lays'
        ];

        // Daftar merek mouse
        $drinkBrands = [
            'cocacola',
            'pocari',
            'teh botol',
            'teh kotak',
            'fruitea',
            'good day',
        ];

        // Daftar merek Ram
        $foodBrands = [
            'French fries',
            'Fried Chicken',
            'Baked Potato',
        ];

        $name = $category == 'snack'
            ? $this->faker->randomElement($ipadBrands)
            : ($category == 'food'
                ? $this->faker->randomElement($mouseBrands)
                : $this->faker->randomElement($ssdBrands));

        $description = $category == 'snack'
            ? $this->faker->randomElement([
                'Kebanyakan orang menganggap bahwa camilan adalah penyebab obesitas.',
                'padahal camilan berfungsi untuk menjaga metabolisme tubuh selama jeda menuju jam makan besar.',
            ])
            : ($category == 'drink'
                ? $this->faker->randomElement([
                    'Minuman yang segar sangatlah penting untuk memuaskan dahaga.',
                    'Sangat dikonsumsi setelah beraktivitas..',
    
                ])
                : $this->faker->randomElement([
                    'Makanan atau panganan adalah zat yang dimakan oleh makhluk hidup.',
                    'Untuk mendapatkan nutrisi yang kemudian diolah menjadi energi..',
                ]));

        return [
            'name' => $name,
            'description' => $description,
            'price' => $this->faker->numberBetween(100000, 10000000),
            'image' => $this->faker->imageUrl(640, 480, 'product', true),
            'category_id' => $category == 'iPad' ? 1 : ($category == 'Mouse' ? 2 : 3),
            'expired_at' => now()->addDays(365),
            'modified_by' => $this->faker->randomElement(['user@gmail.com', 'msyahril@gmail.com'])
        ];
    }
}
