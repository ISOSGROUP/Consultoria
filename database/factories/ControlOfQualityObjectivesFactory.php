<?php

namespace Database\Factories;

use App\Models\ControlOfQualityObjectives;
use Illuminate\Database\Eloquent\Factories\Factory;

class ControlOfQualityObjectivesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ControlOfQualityObjectives::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quality_politics' => $this->faker->text,
        'objectives' => $this->faker->text,
        'indicator' => $this->faker->text,
        'formula' => $this->faker->text,
        'measurement_frequency' => $this->faker->text,
        'goals' => $this->faker->text,
        'status_to_date' => $this->faker->text,
        'responsible_for_providing_data' => $this->faker->text,
        'activities' => $this->faker->text,
        'resources' => $this->faker->text,
        'responsible' => $this->faker->text,
        'plazo' => $this->faker->text,
        'effectiveness_verification' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
