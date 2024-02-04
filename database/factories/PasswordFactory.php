<?php

namespace Database\Factories;

use App\Models\Password;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Password>
 */
class PasswordFactory extends Factory
{
    protected $model = Password::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => 1,
            'nama_password' => $this->faker->domainName(),
            'deskripsi_password' => $this->faker->words(10, true),
            'username' => $this->faker->userName(),
            'password' => $this->faker->userName()
        ];
    }
}
