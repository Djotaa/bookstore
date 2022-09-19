@extends('layouts.layout')

@section('keywords')
    books,bookstore,all,novels,search
@endsection

@section('description')
    Bookstore - see our offer of books.
@endsection

@section('title')
    Books
@endsection

@section('content')
    <div class="container mt-5 prostor">
        <div class="row w-100 m-0">
            <div class="col-lg-3 p-2">
                <div class="row">
                    <div class="col-12">
                        <p class="font-weight-bold accent">Sort by:</p>
                        <select class="custom-select" name="sortBy" id="sort">
                            <option value="price-asc">Price asc</option>
                            <option value="price-desc">Price desc</option>
                            <option value="book_name-asc">Book name asc</option>
                            <option value="book_name-desc">Book name desc</option>
                        </select>
                        <br/><br/>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <label for="pretraga" class="accent">Search</label>
                                <input type="text" class="form-control" id="search" name="search"/>
                            </li>
                        </ul>
                        <br/>

                        <div class="row">
                            <div class="col-12">
                                <p class="font-weight-bold accent">Genres:</p>
                                <ul class="list-group" id="genres">
                                    @foreach($genres as $g)
                                        <li class="list-group-item">
                                            <input type="checkbox" value="{{$g->id}}" class="genre" name="genres"/> {{$g->genre_name}} ({{count($g->books)}})
                                        </li>
                                    @endforeach
                                </ul>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 py-2">
                <h1 class="accent" id="count">Books</h1>
                <div class="row m-0 w-100" id="products">

                </div>
                <div id="loader" class="justify-content-center">
                    <div class="loadingio-spinner-rolling-5dqev8yz7mg"><div class="ldio-zftvpl388ch">
                            <div></div>
                        </div></div>
                </div>
            </div>
            <div class="col-9 offset-3" id="pagination">
                <ul class="pagination">

                </ul>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    const imgPath = '{{asset('img/books/')}}';
</script>
@endpush
