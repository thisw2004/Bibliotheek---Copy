<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DAO\BookDAO;
use App\Models\Uitlening;

class MijnBoekenController extends Controller
{
    private $bookDAO;

    public function __construct()
    {
        $this->bookDAO = new BookDAO();
    }

    // Display all books borrowed by the current user
    public function index()
    {
        $id = Auth::id();
        $books = $this->bookDAO->getBooksByUser($id);
        return view('books.mybooks', ['books' => $books]);
    }

    // Show details of a book
    public function show($CatalogNumber)
    {
        $book = $this->bookDAO->getBookByCatalogNumber($CatalogNumber);
        return view('books.book')->with('book', $book);
    }

    // Loan a book
    public function loan($CatalogNumber)
    {
        $userID = Auth::id();
        $success = $this->bookDAO->loanBook($CatalogNumber, $userID);

        if ($success) {
            return redirect('/myBooks')->with("success", "Je hebt het boek geleend!");
        } 
    }

    // Return a book
    public function handIn($CatalogNumber)
    {
        $userID = Auth::id();
        $success = $this->bookDAO->returnBook($CatalogNumber, $userID);

        if ($success) {
            return redirect('/myBooks')->with("success", "Je hebt het boek weer ingeleverd!");
        } 
    }

    // Show all borrowed books (Admin View)
    public function JustBorrowed()
    {
        $books = Uitlening::all();
        return view('books.justborrowed', ['books' => $books]);
    }
}
?>
