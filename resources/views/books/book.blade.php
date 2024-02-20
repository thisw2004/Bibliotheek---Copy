<?php use App\Http\Controllers\MijnBoekenController; ?>

@extends('layouts.app')
@section('content')

    <div class="card mx-auto" style="width: 70%; max-height:50vh; ">
        
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
                
                <a href="/home" class="btn btn-primary m-1  ">Terug</a>
                
                <a href="{{ route('loan', ['CatalogNumber' => $book->CatalogNumber]) }}" class="btn btn-success m-1">Lenen</a>
                {{-- if this route won't work: try php artisan route:clear && php artisan route:cache --}}

                <a href="{{ route('HandIn', ['CatalogNumber' => $book->CatalogNumber]) }}" class="btn btn-danger m-1">Inleveren</a>
                
            </div>
        </div>
    </div>

@endsection                


    