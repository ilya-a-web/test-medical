<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'age', 'mother_id'];

    public function mother()
    {
        return $this->belongsTo(Cat::class, 'mother_id');
    }

    public function kittens()
    {
        return $this->hasMany(Cat::class, 'mother_id');
    }

    public function fathers()
    {
        return $this->belongsToMany(Cat::class, 'cats_father', 'kitten_id', 'father_id');
    }

    public function fatheredKittens()
    {
        return $this->belongsToMany(Cat::class, 'cats_father', 'father_id', 'kitten_id');
    }
}
