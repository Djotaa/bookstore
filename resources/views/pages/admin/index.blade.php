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
<div class="container p-2 prostor">
    <h1 class="accent mt-2">Admin panel</h1>
    <div class="row w-100">
        <div class="col-12">
            <div class="row w-100">
                <div class="col-12 col-sm-6 mb-2">
                    <h2>Recent user activity</h2>
                </div>
                <div class="col-12 col-sm-6 mb-2">
                    <form action="{{route('admin.home')}}" method="GET">
                        <label for="sortBy">Sort by</label>
                        <select name="sortBy">
                            <option {{(isset($qs['sort']) && $qs['sort'] == 'created_at-asc') ? 'selected' : ''}} value="created_at-asc">Date ASC</option>
                            <option {{(isset($qs['sort']) && $qs['sort'] == 'created_at-desc') ? 'selected' : ''}} value="created_at-desc">Date Desc</option>
                        </select>
                        <input type="submit" value="Sort" class="btn btn-outline-warning">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-11 p-0">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Activity</th>
                        <th>User name</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($activities as $a)
                        <tr>
                            <td>{{$a->type}}</td>
                            <td>{{$a->user_name}}</td>
                            <td>{{$a->created_at}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>No recent activities to display</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{$activities->links("pagination::bootstrap-4")}}
    </div>
</div>
@endsection
