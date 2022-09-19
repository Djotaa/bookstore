@extends('layouts.layout')

@section('keywords')
    books,bookstore,cart,novels,order
@endsection

@section('description')
    Bookstore - review the items in your cart.
@endsection

@section('title')
    Cart
@endsection

@section('content')
   <div class="prostor">
       <div class="container mx-auto mt-5">
           @if(count($cartItems) == 0)
               @if(session()->has('msg'))
                   <div class=" mt-5 mx-auto alert alert-success"><p>Your order has been placed. Go back to the <a href="{{route('books.index')}}">store</a></p></div>
               @else
                   <div class=" mt-5 mx-auto alert alert-danger"><p>You have nothing in your cart. Visit the <a href="{{route('books.index')}}">store</a></p></div>
               @endif
           @else
               <div class="row">
                   <div class="container">
                       <h1 class="accent text-center"><b>Shopping Cart</b></h1>
                   </div>

                   <div class="col-12 cart">
                           <div class="title">
                               <div class="row">
                                   <div class="col align-self-center text-right accent" id="count">{{count($cartItems)}} items</div>
                               </div>
                           </div>

                           @foreach($cartItems as $c)
                               <div class="border-top border-bottom p-2 mb-3 cart-item" id="cart_item_{{ $c->bookId }}">
                                   <div class="row main align-items-center justify-content-between">
                                       <div class="col-3 col-md-2"><img class="img-fluid" src="{{ asset("img/books/".$c->image) }}"></div>
                                       <div class="col-3 col-md-2">
                                           <div class="row accent">Book</div>
                                           <div class="row"><a id="name" href="{{route('books.show',['book'=>$c->bookId])}}">{{ $c->name }}</a></div>
                                       </div>
                                       <div class="col-2">
                                           <div class="row accent">Quantity</div>
                                           <div class="row"><input class="form-control quantity" min="1" data-price="{{$c->price}}" data-id="{{$c->bookId}}" type="number" value="{{ $c->quantity }}"></div>
                                       </div>
                                       <div class="col-2">
                                           <div class="row accent">Price</div>
                                           <div class="row">&euro;<span class="product_price" id="span_price_{{ $c->bookId }}">{{ $c->price * $c->quantity }}</span></div>
                                       </div>
                                       <div class="col-1">
                                           <a href="#!"><span class="remove" data-id="{{$c->bookId}}" class="close">&#10005;</span></a>
                                       </div>
                                   </div>
                               </div>
                           @endforeach

                           <div class="back-to-shop"><a href="/books">&leftarrow;<span class="text-muted">Back to shop</span></a></div>
                       <div class="col text-right"><span class="accent font-weight-bold">Total price: </span>&euro; <span id="totalPrice"> </span></div>
                       <div class="col text-right"><a href="{{route('checkout')}}" class="btn btn-outline-warning" id="checkout">Checkout</a></div>
                       </div>
               </div>
           @endif
           <br>
           <br>
           <br>
       </div>
   </div>
@endsection
