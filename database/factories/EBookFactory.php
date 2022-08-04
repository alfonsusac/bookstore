<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EBook>
 */
class EBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(3, true),
            'author'=>$this->faker->name,
            'description'=>$this->faker->paragraph(10),
        ];
    }

}
