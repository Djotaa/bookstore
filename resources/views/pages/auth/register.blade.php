@extends('layouts.layout')

@section('keywords')
    books,bookstore,account,novels,register
@endsection

@section('description')
    Bookstore - register and create a new account.
@endsection

@section('title')
    Register
@endsection

@section('content')
    <div class="prostor">
        <div class="container py-5">
            <h1 class="text-center accent">Register</h1>
            <div class="row py-5">
                <div class="col-12 col-lg-5 mx-auto py-5">
                    @if(session()->has('error'))
                        <div class="alert alert-danger rounded text-center">
                            <p>{{session()->get('error')}}</p>
                        </div>
                    @endif
                        @if(session()->has('success'))
                            <div class="alert alert-success rounded text-center">
                                <p>{{session()->get('success')}}</p><span>Click <a class='accent' href="{{route('login')}}">here</a> to login now</span>
                            </div>
                        @endif
                    <form action="{{route('doRegister')}}" name="regForm" id="regForm" method="post">
                        <div class="form-group">
                            <label for="tbName">Full name<mark>*</mark></label>
                            <input type="text" name="tbName" id="tbName" class="form-control" value="{{old('tbName')}}"/>
                            <p class="greska text-danger">@error('tbName') {{$message}} @enderror</p>
                        </div>
                        <div class="form-group">
                            <label for="tbEmail">Email<mark>*</mark></label>
                            <input type="text" name="tbEmail" id="tbEmail" class="form-control" value="{{old('tbEmail')}}"/>
                            <p class="greska text-danger">@error('tbEmail') {{$message}} @enderror</p>
                        </div>
                        <div class="form-group">
                            <label for="tbPass">Password<mark>*</mark></label>
                            <input type="password" name="tbPass" id="tbPass" class="form-control" />
                            <p class="greska text-danger">@error('tbPass') {{$message}} @enderror</p>
                        </div>
                        <div class="col-12"><p><mark>*</mark> Required fields</p></div>
                        <div class="form-group text-center">
                            <input type="submit" name="btnReg" id="btnReg" class="auth-button" value="Register" />
                            <p class="uspeh text-primary"></p>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
