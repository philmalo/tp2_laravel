<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;
use App\Models\User;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();
        return [
            'nom' => $user->name,
            'adresse' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'courriel' => $user->email,
            'date_de_naissance' => $this->faker->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
            'ville_id' => $this->faker->randomElement(Ville::pluck('id')),
            'user_id' => $user->id
        ];
    }
}
