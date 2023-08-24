<?php

namespace Database\Factories\ReadModels;

use App\ReadModels\District;
use Faker\Provider\ru_RU\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class DistrictFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = District::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape([
        'id'   => "string",
        'name' => "array",
        'slug' => "array",
    ])]
    public function definition(): array
    {
        $this->faker->addProvider(new Address($this->faker));

        $ua = $this->faker->streetName;
        $ru = $this->faker->streetName;

        return [
            'id'   => $this->faker->unique()->uuid,
            'name' => [
                'ua' => $ua,
                'ru' => $ru,
            ],
            'slug' => [
                'ru' => Str::slug($ru),
                'ua' => Str::slug($ua),
            ],

        ];
    }

}
