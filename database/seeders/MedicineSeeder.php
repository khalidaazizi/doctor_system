<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medicine;
use App\Models\MedicineDetail;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicines = ['Paracetamol', 'Amoxicillin', 'Ibuprofen', 'Cetrizine'];

        foreach ($medicines as $name) {
            $medicine = Medicine::create(['medicines_name' => $name]);
            // هر دارو چند مدل بسته‌بندی دارد
            $types = ['Tablet', 'Syrup', 'Capsule'];
            foreach ($types as $pack) {
                MedicineDetail::create([
                    'medicines_id' => $medicine->id,
                    'packing' => $pack
                ]);
            }
        }
    }
}
