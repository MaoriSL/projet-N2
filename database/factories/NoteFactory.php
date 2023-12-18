<?php

namespace Database\Factories;

use App\Models\Scene;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function(){
                return User::inRandomOrder()->first()->id;
            },
            'scene_id' => function(){
                return Scene::inRandomOrder()->first()->id;
            },
            'value' => $this->faker->numberBetween(0,5),
        ];
    }
}
