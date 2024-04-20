<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'hospital_id'];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

}
