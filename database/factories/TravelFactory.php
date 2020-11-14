<?php

namespace Database\Factories;

use App\Models\{Travel, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class TravelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Travel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bg'          => 'img_travels/default_travel.jpg',
            'name'        => $this->faker->sentence(),
            'description' => $this->faker->paragraph(10),
            'location'    => $this->faker->streetName(),
            'slug'        => \Str::slug($this->faker->sentence()),
            'user_id'     => User::factory(),
        ];
    }
}
