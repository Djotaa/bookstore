@extends('layouts.layout')

@section('keywords')
    books,bookstore,account,novels,login
@endsection

@section('description')
    Bookstore - login to your account.
@endsection

@section('title')
    Login
@endsection

@section('content')
    <div class="prostor">
        <div class="container py-5">
            <h1 class="text-center accent">Login</h1>
            <div class="row py-5">
                <div class="col-12 col-lg-5 mx-auto py-5">
                    @if(session()->has('error'))
                    <div class="alert alert-danger rounded text-center">
                        <p>{{session()->get('error')}}</p>
                    </div>
                    @endif
                    <form action="{{route('doLogin')}}" name="logForm" id="logForm" method="post">
                        <div class="form-group">
                            <label for="tbEmail">Email</label>
                            <input type="text" name="tbEmail" id="tbEmail" class="form-control" value="{{old('tbEmail')}}"/>
                            <p class="greska text-danger">@error('tbEmail') {{$message}} @enderror</p>
                        </div>
                        <div class="form-group">
                            <label for="tbPass">Password</label>
                            <input type="password" name="tbPass" id="tbPass" class="form-control" />
                            <p class="greska text-danger">@error('tbPass') {{$message}} @enderror</p>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="btnLogin" id="btnLogin" class="auth-button" value="Login" />
                            <p class="uspeh text-primary"></p>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
