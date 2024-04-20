<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = ['name', 'address', 'email', 'phone'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
