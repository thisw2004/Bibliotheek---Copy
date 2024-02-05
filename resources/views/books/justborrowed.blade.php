@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- voor veel op veel relatie --}}
            <h1>Just borrowed</h1>
            {{-- hier back link --}}
            {{-- <div class="button-container">
                <a href="{{ asset('html/BookOTM.html') }}">
                    <img id="BookOTMimgHome" src="{{ asset('img/BookOTM.jpeg') }}">
                </a>
            </div> --}}
            
            <div class="button-container">
                <a href="/home" id="BackBtnJB">
                    <img id="BookOTMimgHome" src="{{ asset('img/left-arrow.png') }}">
                </a>
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

                    {{-- werkt nog niet helemaal lekker... --}}
                    @if($books->isEmpty())
                        <p>Sorry, er zijn geen recente uitleningen gevonden!</p>
                    @else
                        <div class="row row-cols-1 ">
                            <table id="TableJB">
                                <tr> 
                                    <th>Leningsnummer:</th>
                                    <th>Geleend door:</th>
                                    <th>Titel:</th>
                                    <th>Uitgeleend op:</th>
                                    <th>Ingeleverd op:</th>
                                </tr>
                                @foreach($books as $book)
                                <tr>
                                          <td>{{$book->ID}}</td>
                                          <td>{{$book->UserID}}</td>
                                          <td>{{$book->BookID}}</td>
                                          <td>{{$book->DatumUitgeleend}}</td>
                                          <td>{{$book->DatumIngeleverd}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    @endif    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

