<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookEditorController extends Controller
{
    public function show(Book $book)
    {
        // TODO: Load images "->load('images')"
        return Inertia::render('book-editor', [
            'book' => $book->load('images'),
        ]);
    }

    public function uploadImages(Book $book)
    {
        // TODO: Implement spattie media library
    }
}
