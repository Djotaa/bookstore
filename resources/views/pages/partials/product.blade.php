@php
    $authorArr = [];
    foreach($b->authors as $a){
       array_push($authorArr,$a->name);
    }
    $author = implode(', ',$authorArr);
@endphp
<div class="col-10 col-sm-6 col-md-4 mt-2 mx-auto mx-md-0">
    <div class="product card">
        <img src="{{asset('img/books/'.$b->image)}}" class="card-img-top" alt="{{$b->book_name}}">
        <div class="card-body">
            <a href="{{route('books.show',['book'=>$b->id])}}" id="name">
                <h5 class="card-title">{{$b->book_name}}</h5><hr>
            </a>
            <p class="card-text m-0">Genre: {{$b->genre->genre_name}}</p><hr><p class="card-text m-0">Author: {{$author}}</p><hr>
            <p class="card-text font-weight-bold m-0" id="price">Price: ${{$b->price}}</p>
            @if(session()->has('user') && session()->get('user')->role->role_name == 'admin')
                <a href="{{route('books.edit',['book'=>$b->id])}}" class="btn btn-outline-warning mt-2">Edit</a>
                <form action="{{route('books.destroy',['book'=>$b->id])}}" method="POST">
                    <input type="submit" class="btn btn-outline-danger mt-2" value="Delete"/>
                    @csrf
                    @method('delete')
                </form>
            @else
                <a href="#!" class="btn btn-outline-warning mt-2 addToCart" data-id="{{$b->id}}">Add to cart</a>
            @endif
        </div>
    </div>
</div>
