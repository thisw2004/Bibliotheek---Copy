@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/customstyle.css')}}">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- justborrowed,voor veel op veel relatie --}}
            <h1 id="JustBorrowedTitle">Bekijk <a href="/JustBorrowed">hier</a> welke boeken zojuist geleend zijn!</h1>

            {{-- Book of the month,review --}}
            <a href="{{ asset('html/BookOTM.html') }}">
                <img id="homeBackImg" style="
                width: 100px;
                height: 100px;
                float: right;
                margin-top:30px;
                margin-left:-300px;
                /* margin-right:-20px; */
                /* padding-left:200px; */
                /* //padding:right:200px; */
                
                border-radius:10%;" 
                src="{{ asset('img/BookOTM.jpeg') }}">
            </a>

            <div name="FeeCheck" style="
            float: right;
            margin-top: 200px; /* Keep the same margin-top as the Book of the Month image */
            width: 300px ;
            height:300px;
            margin-left: 20px;
            background-color: #87CEEB;
            border-radius: 10%;" >

                <h2 style="text-align:center; margin-top:10%;">Heb ik een boete?</h2>
            
                <form id="lateFeeForm" style="text-align:center; margin-top:50px;">
                    @csrf <!-- CSRF protection for Laravel -->
                    <label for="loanDate" style="margin-top:10px; margin-bottom:10px;">Wanneer heb je het boek geleend? </label>
                    <input type="date" style="margin-bottom:10px;" id="loanDate" name="loanDate" required><br>
                    <button type="button" style="background-color:#00134d; color:white; border-radius:5px; border:none;" id="calculateButton">Bereken je boete</button>
                </form>
                <p style="text-align:center; margin-top:5px;" id="lateFeeResult"></p>
            
                <!-- Include jQuery library (if not already included) -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="{{ asset('js/library.js') }}"></script>
                <script src="{{ asset('js/app.js') }}"></script>
            </div>

            
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

                    
                    @if($books->isEmpty())
                        <p>Sorry, er zijn geen boeken in onze catalogus aanwezig op dit moment!</p>
                    @else
                        <div class="row row-cols-1 row-cols-md-3">
                            @foreach($books as $book)
                                <div class="col mb-4">
                                    <div class="card" style="height: 100%;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$book->Title}}</h5>
                                            <p class="card-text">{{$book->Description}}</p>
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
