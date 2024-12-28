<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Uitlening;
use Illuminate\Support\Facades\DB;


class MijnBoekenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get id from current user
        $id = Auth::id();
        //get books from current user
        $books = Book::where('UserID', $id)->get(); 
        //return view with books
        return view('books.mybooks', ['books' => $books]);

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
        //select book with the specified catalognumber
        $book = Book::where('CatalogNumber', $CatalogNumber)->first();
        //return the book to the view
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
        //select the book with the specified catalognumber.
        $book = Book::where('CatalogNumber', $CatalogNumber)->first();

        if (!$book) {
            return redirect('/myBooks')->with("error", "Boek niet gevonden.");
        }

       //update the status of the book and insert it in the all loans table (for the many on many relationship)
        
        DB::update('UPDATE books SET isBorrowed = 1, UserID = ? WHERE CatalogNumber = ?', [Auth::id(), $CatalogNumber]);

        
        DB::insert('INSERT INTO `uitleningen` (`ID`, `UserID`, `BookID`, `DatumUitgeleend`, `DatumIngeleverd`)
        VALUES (NULL, ' . Auth::id() . ', ' . $CatalogNumber . ', NOW(), NOW() + INTERVAL 3 WEEK);');

        //today is NOW(), and the loan period is 3 weeks,and is now hardcoded.

        //wait one second...
        sleep(1);

        //return to view with succes report.
        return redirect('/myBooks')->with("success", "Je hebt het boek geleend!");
    }

    public function handIn($CatalogNumber)
    {
        //select book with the specified catalognumber
        $book = Book::where('CatalogNumber', $CatalogNumber)->first();

        //change state from the book to 0
        
        DB::update('UPDATE books SET isBorrowed = 0, UserID = ? WHERE CatalogNumber = ?', [Null, $CatalogNumber]);

        DB::insert('INSERT INTO `uitleningen` (`ID`, `UserID`, `BookID`, `DatumUitgeleend`, `DatumIngeleverd`)
        VALUES (NULL, ' . Auth::id() . ', ' . $CatalogNumber . ', NOW(), NOW() + INTERVAL 3 WEEK);');
         //wordt vandaag uitgeleend dus huidige leendattum is nu
        //omdat het boek over 3 weken moet worden uitgeleend is de datum dat ie ingeleverd moet worden +3 weken
        //3 weken is hier de hardcode leentermijn.

        //ff wachten... anders gaat het iets te snel...
        sleep(1);

        //return to view with succes report
        return redirect('/myBooks')->with("success", "Je hebt het boek weer ingeleverd!");
    }

    public function JustBorrowed(){
        //select all loand books
        $books = Uitlening::all();
        //return the books to the view
        return view('books.justborrowed', ['books' => $books]);
        
    }

}
