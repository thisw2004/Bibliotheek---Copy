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
                    {{-- schijnt de if niet te pakken als <in dit geval> user geen boeken geleend heeft. --}}
                        {{-- @if(!$books) checkt of de var bestaat de isempty erachter of de waarde iets  --}}
                    @if(!$books) 
                        <p>Je hebt op dit moment geen boeken geleend.</p>
                        {{-- onderstaande werkt ook niet  --}}
                        {{-- {{ __('Boeken Overzicht ') }} <br>  --}}
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
