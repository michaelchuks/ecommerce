<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        "name","category","image","video","quantity","status","color","size","is_promoted","status","price","description","discount","rating"
    ];
}
