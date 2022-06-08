<?php

namespace Database\Factories;

use App\Models\Riesgos;
use Illuminate\Database\Eloquent\Factories\Factory;

class RiesgosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Riesgos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'risk_chance_radio' => $this->faker->text,
        'process' => $this->faker->text,
        'probability' => $this->faker->text,
        'impact' => $this->faker->text,
        'risk_level' => $this->faker->text,
        'interested_part' => $this->faker->text,
        'foda_reference' => $this->faker->text,
        'action_to_take' => $this->faker->text,
        'responsible' => $this->faker->text,
        'resources' => $this->faker->text,
        'execution_time' => $this->faker->word,
        'responsible_for_monitoring' => $this->faker->text,
        'tracking_status' => $this->faker->text,
        'is_effective' => $this->faker->text,
        'comment_on_effectiveness' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
