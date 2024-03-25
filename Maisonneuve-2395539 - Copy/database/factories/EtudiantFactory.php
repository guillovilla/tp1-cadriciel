<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $villesExist = \App\Models\Ville::pluck('id')->toArray();
    
        return [
            'nom' => $this->faker->name,
            'adresse' => $this->faker->address,
            'téléphone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'date_de_naissance' => $this->faker->date,
            'ville_id' => $this->faker->randomElement($villesExist),
        ];
    }
}
