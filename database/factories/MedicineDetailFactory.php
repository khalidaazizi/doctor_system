<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Medicine;

class MedicineDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
  
            'medicines_id' => Medicine::factory(),
            'packing' => $this->faker->randomElement(['1 Bottle syrup','1 Soap bar','1 ointment', '10 Tablets', '20 Tablets']),
            'strength' => $this->faker->randomElement(['250 mg', '500 mg', '1000 mg']),
            'form' => $this->faker->randomElement(['Syrup', 'Tablet', 'Cream']),
            'status' => $this->faker->randomElement(['Available', 'Not Available']),
        ];
    }
}
