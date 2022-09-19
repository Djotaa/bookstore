@extends('layouts.admin_layout')

@section('keywords')
    books,bookstore,admin,novels,add
@endsection

@section('description')
    Bookstore - admin add new book
@endsection

@section('title')
    Add a new book
@endsection

@section('content')
    <div class="container p-3 prostor">
        <div class="mx-auto">
            @if(session()->has('success'))
                <div class="alert alert-success rounded text-center">
                    <p>Added new book!</p>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger rounded text-center">
                    <p>{{session()->get('error')}}</p>
                </div>
            @endif
            <h1 class="accent">Add a new book</h1>
        </div>
        <div class="row p-2">
            <div class="col-12">
                <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Book title" value="{{old('title')}}">
                        <span class="text-danger">@error('title'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="genreId">Select genre</label>
                        <select class="form-control" name="genreId">
                            <option value="0">Select</option>
                            @foreach($genres as $g)
                            @if(old('genreId') == $g->id)
                                <option selected value="{{$g->id}}">{{$g->genre_name}}</option>
                            @else
                                <option value="{{$g->id}}">{{$g->genre_name}}</option>
                            @endif
                            @endforeach
                        </select>
                        <span class="text-danger">@error('genreId'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group container1">
                        <label>Author</label>
                        <input type="text" class="form-control mb-2" name="author1" value="{{old('author1')}}" placeholder="Author name">
                        <input type="text" class="form-control mb-2" name="author2" value="{{old('author2')}}" placeholder="Optional">
                        <span class="text-danger">@error('author1'){{$message}}@enderror</span>
                        <span class="text-danger">@error('author2'){{$message}}@enderror</span>

                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" value="{{old('price')}}" name="price" placeholder="Price"/>
                        <span class="text-danger">@error('price'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="publishYear">Publication year</label>
                        <input type="text" class="form-control" value="{{old('publishYear')}}" name="publishYear" placeholder="Publication year"/>
                        <span class="text-danger">@error('publishYear'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" rows="3">{{old('description')}}</textarea>
                        <span class="text-danger">@error('description'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control-file"/>
                        <span class="text-danger">@error('image'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <div><input type="submit" value="Add" class="btn btn-outline-warning"/></div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
