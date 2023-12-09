<?php use App\Http\Controllers\MijnBoekenController; ?>

@extends('layouts.app')
@section('content')
{{-- @if(!$book)
<p>Kon geen boek vinden!</p>
@else --}}
    <div class="card mx-auto" style="width: 70%; max-height:50vh; ">
        {{-- set default height of the card --}}
        <div class="card-body" style="max-height:50vh;">
            <h5 class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <b>Titel:</b> {{$book->Title}}
                    </div>
                    <div class="col-md-6 text-md-end">
                        <b>Auteur:</b> {{$book->Author}}
                    </div>
                </div>
            </h5>
            <div class="card-text">
                <p>{{$book->Description}}</p>
                <p>ISBN:{{$book->ISBN}}</p>
            </div>
            <div class="card-footer mx-auto d-flex justify-content-center ">
                {{-- terug naar overzicht van boeken --}}
                {{-- weergave van buttons is afh van of boek geleend is of niet en door de huidig ingelogde user of niet --}}
                {{-- daarnaast nog weergeven of deze uitgeleend is. --}}

                {{-- ADJUST THE BUTTONS CORRECT --}}
                <a href="/home" class="btn btn-primary m-1  ">Terug</a>
                
                {{-- print CatalogNumber --}}
                {{-- <p>{{$book->CatalogNumber}}</p>  --}}
                
                <a href="{{ route('loan', ['CatalogNumber' => $book->CatalogNumber]) }}" class="btn btn-success m-1">Lenen</a>
                {{-- als deze link icm de route in web.php niet meer werkt,probeer php artisan route:clear && php artisan route:cache --}}

                <a href="{{ route('HandIn', ['CatalogNumber' => $book->CatalogNumber]) }}" class="btn btn-danger m-1">Inleveren</a>
                {{-- define route in web.php --}}
                
                
            </div>
        </div>
    </div>
{{-- @endif --}}
@endsection                


    