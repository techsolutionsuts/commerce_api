<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'description'];

    public function item_category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}