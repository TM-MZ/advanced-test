<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fullname'=>$this->faker->name,
            'gender'=>$this->faker->numberBetween(1,2),
            'email'=>$this->faker->safeEmail,
            'postcode'=>substr_replace($this->faker->postcode, '-',3,0),
            'address'=>$this->faker->address,
            'building_name'=>$this->faker->streetAddress,
            'opinion'=>$this->faker->realText(120,5),

        ];
    }
}
