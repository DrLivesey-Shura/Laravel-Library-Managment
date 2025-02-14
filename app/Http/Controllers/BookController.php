<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    // Display all books
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Show the form for creating a new book
    public function create()
    {
        return view('books.create');
    }

    // Store a newly created book
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Validate the image
        ]);
        if ($request->hasFile('image')) {
            Log::info('Image file detected:', [
                'name' => $request->file('image')->getClientOriginalName(),
                'size' => $request->file('image')->getSize(),
            ]);
            $imagePath = $request->file('image')->store('books', 'public');
            Log::info('Image stored at:', ['path' => $imagePath]);
        } else {
            Log::info('No image file uploaded.');
            $imagePath = null;
        }
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'published_date' => $request->published_date,
            'description' => $request->description,
            'image' => $imagePath, // Save the image path
        ]);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    // Show the form for editing a book
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Update a book
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        ]);

        // Debug: Check if the image is present in the request
        if ($request->hasFile('image')) {
            Log::info('Image file detected:', [
                'name' => $request->file('image')->getClientOriginalName(),
                'size' => $request->file('image')->getSize(),
            ]);
            // Delete the old image if it exists
            if ($book->image && Storage::disk('public')->exists($book->image)) {
                Storage::disk('public')->delete($book->image);
            }
            $imagePath = $request->file('image')->store('books', 'public');
            Log::info('Image stored at:', ['path' => $imagePath]);
        } else {
            Log::info('No image file uploaded.');
            $imagePath = $book->image; // Keep the existing image
        }


        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'published_date' => $request->published_date,
            'description' => $request->description,
            'image' => $imagePath, // Update the image path
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    // Delete a book
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
