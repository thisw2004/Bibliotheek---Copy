<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserDAO;
use App\Models\BookDAO;

class UserController extends Controller
{
    public function GetAllUsers(){
        // creating instance of the user DAO
        $UserDAO = new UserDAO;
        //call GetAllUsers from the UserDAO
        $users = $UserDAO->GetAllUsers();

        // return books to the admin view
        return view('books.admin',['users' => $users]);

    }

    //for their personal management page
    public function GetUserById($id){
     
        // Creating instance of the User DAO
        $UserDAO = new UserDAO;
        
        //call GetUserById with the $id from the UserDAO
        $user = $UserDAO->GetUserById($id);

        if (!$user) {
            return redirect('/')->with("error", "Gebruiker niet gevonden.");
        }

        //new instance of BookDAO
        $bookDAO = new BookDAO;

        //call SelectBooksOnUserId with the $id from the BookDAO
        $bookData = $bookDAO->SelectBooksOnUserId($id);

        //retrieve the 'books' array from $bookData and the 'numBooks' array from $numBooks;
        $books = $bookData['books'];
        $numBooks = $bookData['numBooks'];

        //return to view,with the data variabeles 
        return view('books.user', compact('user', 'books', 'numBooks'));

    }

    
}
