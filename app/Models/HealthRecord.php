<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'record_date',
        'vaccination_date',
        'id_pet',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'id_pet');
    }
}
