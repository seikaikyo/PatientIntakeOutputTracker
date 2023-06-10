<?php

namespace Database\Factories;

use App\Models\PatientRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientRecordFactory extends Factory
{
    protected $model = PatientRecord::class;

    public function definition()
    {
        $type = $this->faker->randomElement(['攝入', '排出']);
        $content = '';
        $unit = '';

        if ($type == '攝入') {
            $content = $this->faker->randomElement(['水', '飯糰', '麵包', '粥', '蔬菜']);
            // $unit = $content == '水' ? 'cc' : 'g';
        } else {
            $content = $this->faker->randomElement(['尿', '糞便']);
            // $unit = $content == '尿' ? 'cc' : 'g';
        }

        return [
            'dateTime' => $this->faker->dateTime,
            'type' => $type,
            'content' => $content,
            'unit' => $this->faker->numberBetween($min = 50, $max = 500) . $unit,
        ];
    }
}
