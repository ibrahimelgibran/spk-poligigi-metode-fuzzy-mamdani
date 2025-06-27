<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalEquipment extends Model
{
    protected $table = 'medical_equipments';

    protected $fillable = [
        'supplier_id',
        'name',
        'price',
        'brand',
        'warranty',
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
