@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- get user name and current books --}}
            @php
            $userName = Auth::user()->name 

            @endphp
            
            <h2>Mijn Boeken</h2>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/home" class="btn btn-primary" style="margin-bottom:2vh">Terug</a>
            </div>
            <div class="card" >
                
                <div class="card-body" style="max-height: 1000px; overflow-y: auto;">
                    {{-- the reports component,to let the user know that the book is borrowed or handed in   --}}
                    @if (session('status'))
                       
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <script>
                                // Add a script to automatically close the alert after a certain duration
                                $(document).ready(function(){
                                    window.setTimeout(function() {
                                        $(".alert").alert('close');
                                    }, 5000); // Adjust the duration in milliseconds (e.g., 5000 for 5 seconds)
                                });
                            </script>
                        @endif

                    @endif

                    
                    @php

                        $userId = Auth::id();
                        // get all books from current user
                        $books = App\Models\Book::where('UserID', $userId)->get();

                    @endphp

                    @if($books->isEmpty()) 
                        <p>Je hebt op dit moment geen boeken geleend.</p>
                        
                        <a href="/home" class="underlined" style="color:blue">Leen een boek</a>
                    @else

                    <h3 class="text-center" style="padding:2vh">Hallo <b>{{$userName}}</b>, u heeft {{ $books->count() }}  boek(en) geleend!</h3>
                        <hr>
                        <div class="row row-cols-1 row-cols-md-3">
                            @foreach($books as $book)
                                <div class="col mb-4">
                                    <div class="card" style="height: 100%;">
                                        
                                        <div class="card-body">
                                            <h5 class="card-title">{{$book->Title}}</h5>
                                            <p class="card-text">{{$book->Description}}</p>
                                            <a href="/{{$book->CatalogNumber}}" class="btn "><b>></b></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
