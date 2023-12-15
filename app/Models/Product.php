<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function orders(){
        return $this->belongsToMany(PeminjamanModel::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
