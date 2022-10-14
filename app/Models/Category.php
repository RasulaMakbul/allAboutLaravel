<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['categoryName', 'visible', 'description', 'image'];
    #protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
