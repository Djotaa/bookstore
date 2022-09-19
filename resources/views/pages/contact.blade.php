@extends('layouts.layout')

@section('keywords')
    books,bookstore,contact,novels,information
@endsection

@section('description')
    Bookstore - if you have a question, please contact us.
@endsection

@section('title')
    Contact us
@endsection

@section('content')
    <div class="prostor">
        <h1 class="text-center my-5 accent">Contact us</h1>
        <div class="container mx-auto row">
            <div class="col-12 col-md-6 mb-2 p-3">
                <h3 class="text-center accent">Send us a message</h3>
                <form method="post" action='{{route('contact.send')}}' id="con-form" name="conForm">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="tbName">Full name<mark>*</mark></label>
                            <input type="text" class="form-control" name="tbName" id="tbName"placeholder="ex. John Doe" value="{{old('tbName')}}"/>
                            <p class="greska text-danger">@error('tbName') {{$message}} @enderror</p>
                        </div>
                        <div class="form-group col-12">
                            <label for="tbEmail">Email<mark>*</mark></label>
                            <input class="form-control" type="text" name="tbEmail" id="tbEmail" placeholder="ex. johndoe@gmail.com" value="{{old('tbEmail')}}"/>
                            <p class="greska text-danger">@error('tbEmail') {{$message}} @enderror</p>
                        </div>
                        <div class="form-group col-12">
                            <label for="tbMessage">Your message<mark>*</mark></label>
                            <textarea name="userMessage" id="userMessage" class="form-control" placeholder="Your message.">{{old('tbMessage')}}</textarea>
                            <p class="greska text-danger">@error('userMessage') {{$message}} @enderror</p>
                        </div>
                        <div class="col-12"><p><mark>*</mark> Required fields</p></div>
                        <div class="form-group col">
                            <input type="submit" value="Send" name="submitContact" id="btnSubmitContact" class="btn btn-outline-warning d-block mx-auto"/>
                            @if(session()->has('success'))
                                <p class="text-primary"> {{ session()->get('success') }}</p>
                            @elseif(session()->has('error'))
                                <p class="text-danger"> {{ session()->get('error') }}</p>
                            @endif
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
            <div class="col-12 col-md-6 p-3">
                <h3 class="text-center accent">Our contact information</h3>
                <ul id="kontakt">
                    <li class="my-4 accent"><i class="fas fa-map-marker-alt mr-3"></i>Knez Mihailova 10, Belgrade</li>
                    <li class="my-4 accent"><i class="fas fa-phone mr-3"></i>+381 64 987654</li>
                    <li class="my-4 accent"><i class="fas fa-phone mr-3"></i>+381 11 234567</li>
                    <li class="my-4 accent"><i class="far fa-envelope mr-3"></i>bookstore&#64;gmail&#46;com</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
