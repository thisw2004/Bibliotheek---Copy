@extends('layouts.app')
<title>Beheer boeken</title>
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
            {{-- get user name --}}
            @php

                $userName = Auth::user()->name 

            @endphp
            
            <h2>Beheer Boeken</h2>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/home" class="btn btn-primary" style="margin-bottom:2vh">Terug</a>
            </div>
            <div class="card" >
                
                <div class="card-body" style="max-height: 1000px; overflow-y: auto;">
                 
                    @php

                        $userId = Auth::id();
                        //Get books  from current user
                        $books = App\Models\Book::where('UserID', $userId)->get();

                    @endphp

                    @foreach ($users as $user)

                        {{-- page for every user --}}
                        <button style="border:none; border-radius:10px;background-color:#00134d; width:100px; height:50px;margin:10px; ">
                            <a style=" color:white; text-decoration:none; " href="/user/{{$user->id}}">{{$user->name}}</a>
                        </button>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
