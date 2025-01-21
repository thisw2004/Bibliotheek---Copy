@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
    
            <h2>Mijn Boeken</h2>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/home" class="btn btn-primary" style="margin-bottom:2vh">Terug</a>
            </div>

            <h3>Gebruiker '{{ $user->name }}' heeft {{ $numBooks }} boek(en) geleend. Dit zijn de door '{{ $user->name }}' geleende titels:</h3>

            <div class="card" >
                <div class="card-body" style="max-height: 1000px; overflow-y: auto;">
                   
                    @php

                        //get current user
                        $userId = Auth::id();
                        //get all books from current user
                        $books = App\Models\Book::where('UserID', $userId)->get();

                    @endphp

                    @if($books->isEmpty()) 
                        <p>Je hebt op dit moment geen boeken geleend.</p>
                        {{-- lend a book as a suggestion is no books are lend --}}
                        <a href="/home" class="underlined" style="color:blue">Leen een boek</a>
                    @endif
                    
                    {{-- display title and authot from lend books by user --}}
                    <ul>

                        @foreach($books as $book)

                            <li>{{ $book->getTitle() }}, {{ $book->getAuthor() }}</li>
                    
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
