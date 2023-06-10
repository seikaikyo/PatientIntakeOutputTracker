<?php

namespace Database\Seeders;

use App\Models\PatientRecord;
use Illuminate\Database\Seeder;

class PatientRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // 使用模型工廠來生成大量的虛擬測試資料
        PatientRecord::factory()
            ->times(10)
            ->create();
    }
}
