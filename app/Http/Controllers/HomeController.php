<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all();
        return view('home', ['books' => $books]);
    }

    public function loan($CatalogNumber)
    {
        
        $book = Book::find($CatalogNumber);

        if (!$book) {
            return redirect('/myBooks')->with("error", "Boek niet gevonden.");
        }

        // Update the book status
        $book->update([
            'isBorrowed' => 1,
            'UserID' => Auth::id(), // Assuming you're using the currently authenticated user's ID
        ]);

        return redirect('/myBooks')->with("success", "Je hebt het boek geleend!");
    }

}
