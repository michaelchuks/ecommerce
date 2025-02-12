<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;


    protected $fillable = [
        "promoted_product_id","promotion_image","promotion_heading","promotion_content"
    ];
}
