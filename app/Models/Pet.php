<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pet extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = ['name_pet', 'color', 'birth_date', 'category_id', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
