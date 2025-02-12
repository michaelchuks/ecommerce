<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppContent extends Model
{
    use HasFactory;

    protected $fillable = [
        "slider1","slider2","slider3","slider4","hero_heading","hero_top","hero_subtext"
    ];
}
