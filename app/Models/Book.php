<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Book; //??
//voor klasse admin

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['CatalogNumber','Title', 'Description', 'ISBN','IsBorrowed','UserID','Author'];

    public function getTitle()
    {
        return $this->Title;
    }

    public function getAuthor()
    {
        return $this->Author;
    }

}
