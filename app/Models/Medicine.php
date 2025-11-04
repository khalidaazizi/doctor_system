<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    /** @use HasFactory<\Database\Factories\MedicineFactory> */
    use HasFactory;

    protected $guarded=['id'];
    
    public function details()
    {
        return $this->hasMany(MedicineDetail::class, 'medicines_id');
    }
}
