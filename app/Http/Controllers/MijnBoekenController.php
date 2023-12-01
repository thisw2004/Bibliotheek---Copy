<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
//use Auth;

class MijnBoekenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$userId = Auth::id();
        // $userid = Auth::user()->id;
        // $books = Book::where('id',$userid)->get();
        // return view('home', ['books' => $books]);
        //hoe doe je het als je boeken wil weergeven op basis van userid?
        //$userId = Auth::id(); // Alternatively, you can use Auth::user()->id directly
        $id = Auth::id();
    $books = Book::where('UserID', $id)->get(); // Assuming 'user_id' is the foreign key in your books table
    return view('home', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($CatalogNumber)
    {
        //$book = Book::find($CatalogNumber);
        $book = Book::where('CatalogNumber', $CatalogNumber)->first();
        return view('books.book')->with('book',$book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $CatalogNumber)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loan($CatalogNumber)

    {
        //logica voor het lenen van een boek...
        $book = Book::where('CatalogNumber', $CatalogNumber)->first();

        if (!$book) {
            return redirect('/myBooks')->with("error", "Boek niet gevonden.");
        }

        DB::update('UPDATE books SET isBorrowed = 1, UserID = ? WHERE CatalogNumber = ?', [Auth::id(), $CatalogNumber]);

        //ff wachten...
        sleep(2);

        return redirect('/myBooks')->with("success", "Je hebt het boek geleend!");
    }

    public function handIn($CatalogNumber)

    {
        //logica voor het lenen van een boek...
        $book = Book::where('CatalogNumber', $CatalogNumber)->first();

        if (!$book) {
            return redirect('/myBooks')->with("error", "Boek niet gevonden.");
        }

        //status van het boek ingelevrd gaat op 0 omdat het boek niet meer ingeleverd is.
        //de user gaat ook op 0 omdat het boek niet meer uitgeleend is aan een user.
        DB::update('UPDATE books SET isBorrowed = 0, UserID = ? WHERE CatalogNumber = ?', [Null, $CatalogNumber]);

        //ff wachten...
        sleep(2);

        return redirect('/myBooks')->with("success", "Je hebt het boek weer ingeleverd!");
    }

}
