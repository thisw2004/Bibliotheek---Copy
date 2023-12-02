@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">
                    {{ __('Catalogus') }}
                    

                </div>

                <div class="card-body" style="max-height: 1000px; overflow-y: auto;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('Boeken Overzicht ') }} <br>  --}}
                    @if(!$books)
                        <p>Sorry, er zijn geen boeken in onze catalogus aanwezig op dit moment!</p>
                        
                    @else
                        <div class="row row-cols-1 row-cols-md-3">
                            @foreach($books as $book)
                                <div class="col mb-4">
                                    <div class="card" style="height: 100%;">
                                        {{-- wellicht afbeeldingen toevoegen? --}}
                                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                                        <div class="card-body">
                                            <h5 class="card-title">{{$book->Title}}</h5>
                                            <p class="card-text">{{$book->Description}}</p>
                                            {{-- route voor het tonen van een enkel boek moet niet in de web.php? --}}
                                            {{-- <a href="/{{$book->CatalogNumber}}" class="btn "><b>></b></a> --}}
                                            {{-- <a href="{{ route('show', ['CatalogNumber' => $book->CatalogNumber]) }}" class="btn"><b>2></b></a> --}}
                                            <a href="{{ route('show',$book->CatalogNumber) }}" class="btn"><b>></b></a>

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
