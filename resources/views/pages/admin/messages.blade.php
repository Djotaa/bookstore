@extends('layouts.admin_layout')

@section('keywords')
    books,bookstore,admin,novels,home
@endsection

@section('description')
    Bookstore - admin home page.
@endsection

@section('title')
    Admin dashboard
@endsection

@section('content')
    <div class="container prostor">
        <div class="row my-3 justify-content-center">
            @forelse($messages as $m)
                <div class="col-8 border m-2 mx-auto">
                    <h2>User message</h2>
                    <p>Sent by: {{$m->name}}</p>
                    <p>Email: {{$m->email}}</p>
                    <p>Message: </p>
                    <p>{{$m->message}}</p>
                    <p>Date received: {{$m->created_at}} </p>
                </div>
            @empty
                <div class="mt-5 col-10 text-center alert alert-danger"><p>There are no messages to display.</p></div>
            @endforelse

        </div>
    </div>
@endsection
