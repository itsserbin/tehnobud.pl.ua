<?php

namespace Database\Seeders;

use App\ReadModels\Building;
use App\ReadModels\City;
use App\ReadModels\District;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        //        User::factory(1)->create();
        
        City::factory()
            ->has(
                District::factory()
                    ->has(
                        Building::factory()
                            ->count(10)
                    )
                    ->count(5)
            )
            ->count(15)
            ->create();
    }
    
}
