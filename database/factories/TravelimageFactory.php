<?php

namespace Database\Factories;

use App\Models\{Travelimage, Travel};
use Illuminate\Database\Eloquent\Factories\Factory;

class TravelimageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Travelimage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'img'       => 'img_travelimages/default_travelimage.jpg',
            'travel_id' => Travel::factory(),
        ];
    }
}
