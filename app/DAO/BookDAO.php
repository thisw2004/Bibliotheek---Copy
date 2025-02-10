<?php
namespace App\DAO;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookDAO
{
    // Retrieve all books borrowed by a specific user
    public function getBooksByUser($userID)
    {
        return Book::where('UserID', $userID)->get();
    }

    // Retrieve a single book based on CatalogNumber
    public function getBookByCatalogNumber($CatalogNumber)
    {
        return Book::where('CatalogNumber', $CatalogNumber)->first();
    }

    // Loan a book to a user
    public function loanBook($CatalogNumber, $userID)
    {
        $book = $this->getBookByCatalogNumber($CatalogNumber);

        DB::update('UPDATE books SET isBorrowed = 1, UserID = ? WHERE CatalogNumber = ?', [$userID, $CatalogNumber]);

        DB::insert('INSERT INTO `uitleningen` (`ID`, `UserID`, `BookID`, `DatumUitgeleend`, `DatumIngeleverd`)
        VALUES (NULL, ?, ?, NOW(), NOW() + INTERVAL 3 WEEK)', [$userID, $CatalogNumber]);

        return true;
    }

    // Return a book
    public function returnBook($CatalogNumber, $userID)
    {
        $book = $this->getBookByCatalogNumber($CatalogNumber);

        if (!$book || $book->UserID != $userID) {
            return false; // Book not found or doesn't belong to user
        }

        DB::update('UPDATE books SET isBorrowed = 0, UserID = NULL WHERE CatalogNumber = ?', [$CatalogNumber]);

        DB::insert('INSERT INTO `uitleningen` (`ID`, `UserID`, `BookID`, `DatumUitgeleend`, `DatumIngeleverd`)
        VALUES (NULL, ?, ?, NOW(), NOW() + INTERVAL 3 WEEK)', [$userID, $CatalogNumber]);

        return true;
    }
}
?>