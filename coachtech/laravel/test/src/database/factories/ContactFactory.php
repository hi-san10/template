<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id'=>rand(1,5),
            'first_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'gender'=>rand(1,3),
            'email'=>$this->faker->email(),
            'tell'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->streetAddress(),
            'building'=>$this->faker->secondaryAddress(),
            'detail'=>$this->faker->realText(10)
            //
        ];
    }
}
