<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    // \App\Models\Post::factory(200)->create();
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $positions = [
            'Goleiro','Lateral','Zagueiro','Volante','Meia','Ponta','Atacante',
        ];

        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'birth_date' => $this->faker->dateTimeBetween('-20 year', '-4 year'),
            'cpf' => $this->faker->numberBetween(),
            'rg' => $this->faker->numberBetween(),
            'alergy' => $this->faker->words(5, true),
            'medications' => $this->faker->words(5, true),
            'phone_1' => $this->faker->phoneNumber(),
            'phone_2' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetAddress(),
            'picture' => $this->faker->citySuffix(),
            'position_1' => $this->faker->randomElement($positions),
            'position_2' => $this->faker->randomElement($positions),
            'position_3' => $this->faker->randomElement($positions),
            'position_4' => $this->faker->randomElement($positions),
            'attachements' => $this->faker->citySuffix(),
            'kick' => $this->faker->randomElement(['D', 'E']),
            'uniform' => $this->faker->randomElement(['S', 'N']),
            'uniform_size' => $this->faker->randomElement(['PP', 'P', 'M', 'G', 'GG', 'XG']),
            'cpf_responsible' => $this->faker->numberBetween(),
            'name_responsible' => $this->faker->name(),
            'phone_responsible' => $this->faker->phoneNumber(),
            'address_responsible' => $this->faker->streetAddress(),
            'email_responsible' => $this->faker->email(),
        ];
    }
}
