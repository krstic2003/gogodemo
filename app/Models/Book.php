<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $timestamps = true;

    protected $table = 'books';

    protected $guarded = ['id'];

    public function images()
    {
        return $this->media()->where('collection_name', 'images');
    }
}
