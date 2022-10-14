<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    #protected $fillable = ['productName', 'categoryName', 'unitPrice', 'stock', 'unit', 'description', 'color', 'brand', 'image'];
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
