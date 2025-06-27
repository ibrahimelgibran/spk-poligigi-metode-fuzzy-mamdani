<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function bobot()
{
    return $this->hasOne(Bobot::class);
}

     protected $fillable = ['name'];
    public function equipments()
{
    return $this->hasMany(MedicalEquipment::class);
}

}
