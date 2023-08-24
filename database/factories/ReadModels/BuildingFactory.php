<?php

namespace Database\Factories\ReadModels;

use App\ReadModels\Building;
use Faker\Provider\ru_RU\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BuildingFactory extends Factory
{
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Building::class;
    
    
    private const ADDITIONAL_INFORMATION = [
        'ru' => [
            'пластиковые окна',
            'Ванная комната',
            'Санузел',
        ],
        'ua' => [
            'пластикові вікна',
            'Ванна кімната',
            'санвузол',
        ],
    ];
    
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition(): array
    {
        $this->faker->addProvider(new Address($this->faker));
        
        $ua = $this->faker->city;
        $ru = $this->faker->city;
        
        return [
            'id'                     => $this->faker->unique()->uuid,
            'name'                   => [
                'ru' => $ru,
                'ua' => $ua,
            ],
            'slug'                   => [
                'ua' => Str::slug($ua),
                'ru' => Str::slug($ru),
            ],
            'description'            => [
                'ru' => $this->faker->text,
                'ua' => $this->faker->text,
            ],
            'status'                 => [
                'ua' => $this->faker->word,
                'ru' => $this->faker->word,
            ],
            'coordinate'             => [
                'lat' => $this->faker->latitude,
                'lon' => $this->faker->longitude,
            ],
            'status_color'           => $this->faker->safeHexColor,
            'is_active'              => $this->faker->boolean,
            'price'                  => $this->faker->numberBetween(
                1000,
                9000
            ),
            'address'                => [
                'ru' => $this->faker->unique()->address,
                'ua' => $this->faker->unique()->address,
            ],
            'priority'               => $this->faker->numberBetween(
                1,
                1000
            ),
            'additional_information' => [
                'ru' => $this->faker
                    ->randomElements(
                        self::ADDITIONAL_INFORMATION['ru'],
                        random_int(
                            1,
                            3
                        )
                    ),
                'ua' => $this->faker
                    ->randomElements(
                        self::ADDITIONAL_INFORMATION['ua'],
                        random_int(
                            1,
                            3
                        )
                    ),
            ],
        ];
    }
    
}
