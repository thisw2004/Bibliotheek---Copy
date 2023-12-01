<?php use App\Http\Controllers\MijnBoekenController; ?>

@extends('layouts.app')
@section('content')
@if(!$book)
<p>Kon geen boek vinden!</p>
@else
    <div class="card mx-auto" style="width: 70%">
        <div class="card-body">
            <h5 class="card-title">Titel: {{$book->Title}}</h5>
            <div class="card-text">
                <h5>Auteur: {{$book->Author}}</h5>
                <p>{{$book->Description}}</p>
            </div>
            <div class="card-footer row mx-auto">
                {{-- terug naar overzicht van boeken --}}
                {{-- weergave van buttons is afh van of boek geleend is of niet en door de huidig ingelogde user of niet --}}
                {{-- daarnaast nog weergeven of deze uitgeleend is. --}}
                <a href="/home" class="btn btn-primary">Terug</a>
                
                {{-- print CatalogNumber --}}
                {{-- <p>{{$book->CatalogNumber}}</p>  --}}
                
                <a href="{{ route('loan', ['CatalogNumber' => $book->CatalogNumber]) }}" class="btn btn-primary">Lenen</a>
                {{-- als deze link icm de route in web.php niet meer werkt,probeer php artisan route:clear && php artisan route:cache --}}

                <a href="{{ route('HandIn', ['CatalogNumber' => $book->CatalogNumber]) }}" class="btn btn-primary">Inleveren</a>
                {{-- define route in web.php --}}
                
                
            </div>
        </div>
    </div>
@endif
@endsection                


    