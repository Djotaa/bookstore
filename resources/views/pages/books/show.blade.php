@extends('layouts.layout')

@section('keywords')
    books,bookstore,book,novels,information
@endsection

@section('description')
    Bookstore - see book details.
@endsection

@section('title')
{{$book->book_name}}
@endsection

@section('content')
    @include('pages.partials.singleProduct')
@endsection
