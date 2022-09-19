@extends('layouts.layout')

@section('keywords')
    books,bookstore,author,novels,information
@endsection

@section('description')
    Bookstore - information about the author of the site.
@endsection

@section('title')
    Author
@endsection

@section('content')
    <div class="prostor">
        <h1 class="text-center mt-3 accent">Information about the site author</h1>
        <div class="container mx-auto mt-5 row">
            <div class="col-11 col-md-5 p-4">
                <img src="{{asset('img/autor.jpg')}}" alt="Site author Djordje Solomun" class="img-fluid"/>
            </div>
            <div class="col-12 col-md-7 p-5">
                <h4>Djordje Solomun 16/19</h4>
                <p>I am a third year student at the Department School of Information and Communication Technologies, Academy of Technical and Art Applied Studies Belgrade. This website is a project for the Web programming PHP 2 course.</p>
                <p>If you have any questions use my email to reach me: djordje&#46;solomun&#46;16&#46;19&#64;ict&#46;edu&#46;rs</p>
                <p>Take a look at my <a href="https://djotaa.github.io/WebPortfolio/" target="blank">portfolio</a></p>
            </div>
        </div>
    </div>
@endsection

