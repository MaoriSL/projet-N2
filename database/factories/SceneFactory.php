<?php

namespace Database\Factories;

use DateTime;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scene>
 */
class SceneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createAt = $this->faker->dateTimeInInterval(
            $startDate = '-6 months',
            $interval = '+ 180 days',
        );
        return [
            'nom' => $this->faker->name,
            'equipe' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'scene_text' => $this->faker->text,
            'image_link' => $this->faker->imageUrl,
            'vignette_link' => $this->faker->imageUrl(100,100),
            'exe_link' => $this->faker->url,
            'auteur_id' => function(){
                return User::inRandomOrder()->first()->id;
            },
            'created_at' => $createAt,
        ];
    }
}
