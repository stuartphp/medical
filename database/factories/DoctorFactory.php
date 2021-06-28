<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'practice_number'=>$this->faker->randomNumber(6, true),
            'practice_name'=>'Dr. '.$this->faker->name(),
            'physical_address1'=>$this->faker->streetAddress,
            'physical_address2'=>null,
            'physical_suburb'=>$this->faker->city,
            'physical_town'=>$this->faker->city,
            'physical_postal_code'=>$this->faker->postcode,
            'physical_province'=>$this->faker->state,
            'postal_address1'=>$this->faker->city,
            'postal_address2'=>null,
            'postal_suburb'=>$this->faker->city,
            'postal_town'=>$this->faker->city,
            'postal_postal_code'=>$this->faker->postcode,
            'fax'=>$this->faker->phoneNumber,
            'contact_number'=>$this->faker->phoneNumber,
        ];
    }
}
