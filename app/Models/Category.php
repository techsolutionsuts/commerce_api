<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // protected $fillable = ['name'];
    protected $guarded = [];

    public function category_item()
    {
        return $this->hasMany(Item::class);
    }

}