<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineDetailSeeder extends Seeder
{
    public function run(): void
    {
        // غیرفعال کردن foreign key برای truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('medicine_details')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $medicineIds = DB::table('medicines')->pluck('id')->toArray();
        // $forms = ['Tablet', 'Syrup', 'Capsule','Cream'];
        $packings = [' 5 mg', ' 10 mg ', '200 mg ', '250 mg', '400 mg' , '500 mg'];
        // $strengths = ['5 mg', '10 mg', '200 mg', '250 mg', '400 mg', '500 mg'];
        $statusOptions = ['Available', 'Not Available']; 
        
        foreach ($medicineIds as $medicineId) {
            $numDetails = rand(2, 4); // هر دارو چند نوع جزئیات دارد
            for ($i = 0; $i < $numDetails; $i++) {
                DB::table('medicine_details')->insert([
                    'medicines_id' => $medicineId,
                    // 'form' => $forms[array_rand($forms)],
                    'packing' => $packings[array_rand($packings)],
                    // 'strength' => $strengths[array_rand($strengths)],
                    'status' => $statusOptions[array_rand($statusOptions)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
