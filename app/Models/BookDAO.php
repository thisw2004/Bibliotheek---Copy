<?php
// app/Models/DAO/BestandDAO.php
namespace App\Models;

use App\Models\Book;

class BookDAO
{

    //select book on bookID
    public function OneBook($bookID)
    {
        //find book on ID using Eloquent
        return Book::find($bookID);
    }

   
    public function SelectBooksOnUserId($id){
           // Select books based on user ID
        $books = Book::where('UserID', $id)->get();

        // Count the number of books
        $numBooks = $books->count();

        //return both books and numbooks
        return ['books' => $books, 'numBooks' => $numBooks];

    }

}

?>