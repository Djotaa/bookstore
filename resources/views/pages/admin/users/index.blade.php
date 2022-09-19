@extends('layouts.admin_layout')

@section('keywords')
    books,bookstore,admin,novels,users
@endsection

@section('description')
    Bookstore - admin users page.
@endsection

@section('title')
    Admin users
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
            <h1 class="accent">Users</h1>
        </div>
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $u)
                    @if($u->role->role_name != 'admin')
                        <tr>
                            <td>{{$u->id}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->role->role_name}}</td>
                            <td>
                                <form action="{{route('admin.users.delete',['user'=>$u->id])}}" method="POST">
                                    <input type="submit" class="btn btn-outline-danger" value="Delete"/>
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
