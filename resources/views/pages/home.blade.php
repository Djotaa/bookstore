@extends('layouts.layout')

@section('keywords')
    books,bookstore,bookshop,novels,home
@endsection

@section('description')
    Bookstore - buy books of all genres and authors.
@endsection

@section('title')
    Home
@endsection

@section('content')
    <div class="container mt-3">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner rounded">
                <div class="carousel-item active" data-interval="3000">
                    <img src="{{asset('img/store.jpg')}}" class="d-block w-100" alt="Book store">
                    <div class="carousel-caption rounded d-none d-md-block text-body">
                        <h1 class="accent">Bookstore</h1>
                        <p>Online book shop</p>
                    </div>
                </div>
                <div class="carousel-item" data-interval="3000">
                    <img src="{{asset('img/books.jpg')}}" class="d-block w-100" alt="Books">
                    <div class="carousel-caption rounded d-none d-md-block text-body">
                        <h2 class="accent">Everything you need</h2>
                        <p>Find books from your favorite authors and genres. Check out the <a href="{{route('books.index')}}" class="btn btn-outline-warning">shop</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="text-center accent">PC Center</h2>
        <div class="row mt-3 d-flex align-items-center">
            <div class="col-9 col-md-6 text-center mx-auto">
                <p>If you like to read this is the place for you. We have something for everyone, and we are always expanding our offer.</p>
                <p>Take a look at our book collection: <a href="{{route('books.index')}}" class="btn btn-outline-warning">shop</a></p>
            </div>
            <div class="col-9 col-md-6 mx-auto">
                <img src="{{asset('img/bookshelf.jpg')}}" alt="Bookshelf" class="w-100 rounded">
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="text-center accent">Newest releases</h2>
        <div class="row w-100 mt-3 pb-3 d-flex justify-content-center align-items-center">
        @foreach($books as $b)
            @php
                $autoriN = [];
                foreach($b->authors as $a){
                   array_push($autoriN,$a->name);
                }
                $autori = implode(', ',$autoriN);
            @endphp

                <div class="col-10 col-sm-6 col-md-3 mt-2 mx-auto">
                    <div class="product card">
                        <img src="{{asset('img/books/'.$b->image)}}" class="card-img-top" alt="The Haunting of Hill House">
                        <div class="card-body">
                            <a href="{{route('books.show',['book'=>$b->id])}}" id="name">
                                <h5 class="card-title">{{$b->book_name}}</h5><hr>
                            </a>
                            <p class="card-text m-0">Genre: {{$b->genre->genre_name}}</p><hr>
                            <p class="card-text m-0">Author: {{$autori}}</p><hr>
                            <p class="card-text font-weight-bold m-0" id="price">Price: ${{$b->price}}</p>
                            <a href="#!" class="btn btn-outline-warning mt-2 addToCart" id="1">Add to cart</a>
                            <p></p>
                        </div>
                    </div>
                </div>
        @endforeach
        </div>
    </div>
@endsection
