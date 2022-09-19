@php
    $authorArr = [];
    foreach($book->authors as $a){
       array_push($authorArr,$a->name);
    }
    $author = implode(', ',$authorArr);
@endphp
<div class="container prostor align-items-center d-flex">
    <div class="row my-3 my-md-0">
        <div class="col-10 col-md-4 col-lg-3 mx-auto ">
            <img class="img-fluid d-block mx-auto mx-md-0" src="{{asset('/img/books/'.$book->image)}}">
        </div>
        <div class="col-8 mx-auto">
            <h2>{{$book->book_name}}</h2>
            <p>Author: {{$author}}</p>
            <p>Genre: {{$book->genre->genre_name}}</p>
            <p>Publication year: {{$book->publish_year}}</p>
            <p>Description: </p>
            <p>{{$book->description}}</p>
            <p>Price: ${{$book->price}}</p>
            @if(session()->has('user') && session()->get('user')->role->role_name == 'admin')
                <a href="{{route('books.edit',['book'=>$book->id])}}" class="btn btn-outline-warning mt-2">Edit</a>
                <form action="{{route('books.destroy',['book'=>$book->id])}}" method="POST">
                    <input type="submit" class="btn btn-outline-danger mt-2" value="Delete"/>
                    @csrf
                    @method('delete')
                </form>
            @else
                <a href="#!" class="btn btn-outline-warning mt-2 addToCart" data-id="{{$book->id}}">Add to cart</a>
            @endif
        </div>
    </div>
</div>
