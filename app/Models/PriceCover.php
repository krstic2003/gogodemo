<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceCover extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'cover_prices';

    protected $fillable = [
        'type',
        'format',
        'price'
    ];
}
