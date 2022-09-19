@extends('layouts.admin_layout')

@section('keywords')
    books,bookstore,admin,novels,genres
@endsection

@section('description')
    Bookstore - admin genre page.
@endsection

@section('title')
    Admin genres
@endsection

@section('content')
    <div class="container prostor pt-3">
        <div class="mx-auto my-3">
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
            <h1 class="accent">Genres</h1>
            <a href="{{route('admin.genres.create')}}" class="btn btn-primary">Add new genre</a>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($genres as $g)
                    <tr>
                        <td>{{$g->genre_name}}</td>
                        <td><a href="{{route('admin.genres.edit',['genre'=>$g->id])}}" class="btn btn-outline-warning">Edit</a></td>
                        <td>
                            <form action="{{route('admin.genres.delete',['genre'=>$g->id])}}" method="POSt">
                                <input type="submit" class="btn btn-outline-danger" value="Delete"/>
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
