<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    use HasFactory;

    protected $fillable = ['id_pet', 'name_pet', 'description'];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'id_pet');
    }
}
