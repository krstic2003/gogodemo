<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ImageController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $images = [];

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                [$width, $height] = getimagesize($image);

                $media = $book
                    ->addMedia($image)
                    ->withCustomProperties([
                        'width' => $width,
                        'height' => $height
                    ])
                    ->toMediaCollection('images');
                    
                $images[] = $media;
            }
        }

        return $images;
    }

    public function update(Request $request, Book $book, $id)
    {
        $image = $book->media()->find($id);

        // TODO: Fix this, what if we have multiple links?
        $image->setCustomProperty('link', $request->input('link'));
    }

    public function delete($id)
    {
        return Media::where('id', $id)->delete();
    }
}
