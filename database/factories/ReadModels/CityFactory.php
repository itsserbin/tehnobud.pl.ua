<?php

namespace Database\Factories\ReadModels;

use App\ReadModels\City;
use Faker\Provider\ru_RU\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class CityFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape([
        'id'   => "string",
        'name' => "array",
        'slug' => "string",
    ])]
    public function definition(): array
    {
        $this->faker->addProvider(new Address($this->faker));

        $ua = $this->faker->city;
        $ru = $this->faker->city;

        return [
            'id'   => $this->faker->unique()->uuid,
            'name' => [
                'ru' => $ru,
                'ua' => $ua,
            ],
            'slug' => [
                'ru' => Str::slug($ru),
                'ua' => Str::slug($ua),
            ],
        ];
    }

}
