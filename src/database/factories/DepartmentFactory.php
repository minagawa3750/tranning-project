<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon; 

class DepartmentFactory extends Factory
{
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    private static int $sequence = 1;

    public function definition()
    {
        return [
            'name' => '部署'.self::$sequence++,
            'manager_name' => $this->faker->name(),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(), 
        ];
    }
}
