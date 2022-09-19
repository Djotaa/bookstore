@extends('layouts.admin_layout')

@section('keywords')
    books,bookstore,admin,novels,products
@endsection

@section('description')
    Bookstore - admin view all products.
@endsection

@section('title')
    Admin products
@endsection
@php
    $sortBy=[['key'=>'Price','value'=>'ASC'],['key'=>'Price','value'=>'DESC'],['key'=>'book_name','value'=>'ASC'],['key'=>'book_name','value'=>'DESC']];
@endphp
@section('content')
    <div class="container mt-5 prostor">
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
        <div class="row w-100 m-0">
            <div class="col-lg-3 p-2">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.products')}}" method="GET">
                            <p class="font-weight-bold accent">Sort by:</p>
                            <select class="custom-select" name="sortBy">
                                @foreach($sortBy as $s)
                                    @if(isset($qs['sortBy']) && explode('-',$qs['sortBy'])[0] == $s['key'] && explode('-',$qs['sortBy'])[1] == $s['value'])
                                        <option selected value="{{$s['key']}}-{{$s['value']}}"> {{ucfirst(implode(' ',explode('_',$s['key'])))}} {{$s['value']}}</option>
                                    @else
                                        <option value="{{$s['key']}}-{{$s['value']}}"> {{ucfirst(implode(' ',explode('_',$s['key'])))}} {{$s['value']}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br/><br/>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <label for="pretraga" class="accent">Search</label>
                                    <input type="text" class="form-control" name="search" value="{{ isset($qs["search"]) ? $qs["search"] : "" }}"/>
                                </li>
                            </ul>
                            <br/>

                            <div class="row">
                                <div class="col-12">
                                    <p class="font-weight-bold accent">Genres:</p>
                                    <ul class="list-group" id="genres">
                                        @foreach($genres as $g)
                                            <li class="list-group-item">
                                                <input type="checkbox" {{ (isset($qs["chbGenres"]) && in_array($g->id, $qs["chbGenres"])) ? "checked" : "" }} value="{{$g->id}}" name="chbGenres[]"/> {{$g->genre_name}} ({{count($g->books)}})
                                            </li>
                                        @endforeach
                                    </ul>
                                    <br/>
                                    <input type="submit" value="Search" class="btn btn-outline-warning">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 py-2">
                <h1 class="accent">Books ({{$books->total()}})</h1>
                <a href="{{route('books.create')}}" class="btn btn-primary">Add a new book</a>

                <div class="row m-0 w-100">
                    @forelse($books as $b)
                        @include('pages.partials.product')
                    @empty
                        <div class="container not-found m-5 alert alert-danger"><p>There are no products that match the criteria.</p></div>
                    @endforelse
                </div>
            </div>
            <div class="col-9 offset-3" id="pagination">
                {{$books->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
@endsection
