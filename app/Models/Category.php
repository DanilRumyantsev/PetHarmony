<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['name_category', 'description'];

    public function pets()
    {
        return $this->hasMany(Pet::class, 'id_category');
    }
}
