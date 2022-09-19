@extends('layouts.admin_layout')

@section('keywords')
    books,bookstore,admin,genre,new
@endsection

@section('description')
    Bookstore - admin add a new genre.
@endsection

@section('title')
    Admin add genre
@endsection

@section('content')
    <div class="container p-3 prostor">
        <div class="mx-auto">
            @if(session()->has('success'))
                <div class="alert alert-success rounded text-center">
                    <p>{{session()->get('success')}}</p>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger rounded text-center">
                    <p>{{session()->get('error')}}</p>
                </div>
            @endif
            <h1 class="accent">Edit genre</h1>
        </div>
        <div class="row p-2">
            <div class="col-12">
                <form action="{{route('admin.genres.update',['genre'=>$genre->id])}}" method="POST">
                    <div class="form-group">
                        <label for="genreName">Genre name</label>
                        <input type="text" class="form-control" name="genreName" placeholder="Genre name" value="{{$genre->genre_name}}">
                        <span class="text-danger">@error('genreName'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <div><input type="submit" value="Edit" name="btnAddGenre" class="btn btn-outline-warning"/></div>
                    </div>
                    @csrf
                    @method('put')
                </form>
            </div>
        </div>
    </div>
@endsection
