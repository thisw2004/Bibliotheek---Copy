<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert the first user
        DB::table('users')->insert([
            'name' => 'test1234',
            'email' => 'test@test.nl',
            'password' => Hash::make('test1234'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Insert books
        DB::table('books')->insert([
            ['CatalogNumber' => '001', 'Title' => 'The Great Gatsby', 'Description' => 'A classic novel by F. Scott Fitzgerald.', 'ISBN' => '9780743273565', 'IsBorrowed' => false, 'UserID' => null, 'Author' => 'F. Scott Fitzgerald'],
            ['CatalogNumber' => '002', 'Title' => 'To Kill a Mockingbird', 'Description' => 'A novel by Harper Lee about racial injustice.', 'ISBN' => '9780061120084', 'IsBorrowed' => true, 'UserID' => 1, 'Author' => 'Harper Lee'],
            ['CatalogNumber' => '003', 'Title' => '1984', 'Description' => 'A dystopian novel by George Orwell.', 'ISBN' => '9780451524935', 'IsBorrowed' => false, 'UserID' => null, 'Author' => 'George Orwell'],
            ['CatalogNumber' => '004', 'Title' => 'Pride and Prejudice', 'Description' => 'A romantic novel by Jane Austen.', 'ISBN' => '9780141040349', 'IsBorrowed' => false, 'UserID' => null, 'Author' => 'Jane Austen'],
            ['CatalogNumber' => '005', 'Title' => 'Moby Dick', 'Description' => 'A novel about a whale hunt by Herman Melville.', 'ISBN' => '9781503280786', 'IsBorrowed' => true, 'UserID' => 1, 'Author' => 'Herman Melville'],
            ['CatalogNumber' => '006', 'Title' => 'War and Peace', 'Description' => 'A historical novel by Leo Tolstoy.', 'ISBN' => '9780199232765', 'IsBorrowed' => false, 'UserID' => null, 'Author' => 'Leo Tolstoy'],
            ['CatalogNumber' => '007', 'Title' => 'The Catcher in the Rye', 'Description' => 'A novel by J.D. Salinger.', 'ISBN' => '9780316769488', 'IsBorrowed' => false, 'UserID' => null, 'Author' => 'J.D. Salinger'],
            ['CatalogNumber' => '008', 'Title' => 'The Hobbit', 'Description' => 'A fantasy novel by J.R.R. Tolkien.', 'ISBN' => '9780547928227', 'IsBorrowed' => false, 'UserID' => null, 'Author' => 'J.R.R. Tolkien'],
            ['CatalogNumber' => '009', 'Title' => 'Fahrenheit 451', 'Description' => 'A dystopian novel by Ray Bradbury.', 'ISBN' => '9781451673319', 'IsBorrowed' => true, 'UserID' => 1, 'Author' => 'Ray Bradbury'],
            ['CatalogNumber' => '010', 'Title' => 'Brave New World', 'Description' => 'A dystopian novel by Aldous Huxley.', 'ISBN' => '9780060850524', 'IsBorrowed' => false, 'UserID' => null, 'Author' => 'Aldous Huxley']
        ]);
    }
}
