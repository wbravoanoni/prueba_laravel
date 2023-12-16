<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->sentence();
        return [
            'title' =>$name,
            'slug' => str($name)->slug(),
            'content' => $this->faker->paragraph(20,true),
            'content' => $this->faker->paragraph(3,true),
            'category_id' => $this->faker->randomElement([1,5,4,6,7,20]),
            'posted' => $this->faker->randomElement(['yes','not']),
            'image' => $this->faker->imageUrl(['yes','not']),

            //
        ];
    }
}
