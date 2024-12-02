<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TimeSlotsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'data' => 'string',
            'ora' => 'string',
        ];
    }

    public static function factoryForModel(string $modelName)
        {
            $factory = static::resolveFactoryName($modelName);

         return $factory::new();
         }
}
