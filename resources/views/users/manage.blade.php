@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-3">
            @include("partials.sidebar")
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="card">
                <div class="card-header">Manage Users</div>

                <div class="card-body">
                    @if(count($users)>=1)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="align-middle text-capitalize">{{$user->name}}</td>
                                    <td class="align-middle">{{$user->email}}</td>
                                    <td class="align-middle text-capitalize">{{$user->role}}</td>
                                    <td>
                                        <a href="/users/show/{{$user->id}}" class="btn btn-outline-success btn-sm float-left mr-1">View</a>
                                        <a href="/users/edit/{{$user->id}}" class="btn btn-outline-warning btn-sm float-left mr-1">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                @else
                    <h3 class="text-center text-capitalize">No users</h3>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection
