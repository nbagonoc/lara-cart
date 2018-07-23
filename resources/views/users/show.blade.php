@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-3">
            @include("partials.sidebar")
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="card">
                <div class="card-header">View User</div>
                <div class="card-body">
                    @if($user)
                        <h4 class="mb-1 text-capitalize">{{ $user->name }}</h4>
                        <p class="mb-0"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="mb-0"><strong>Role:</strong> {{ $user->role }}</p>
                        <hr>
                        <a href="/users/edit/{{$user->id}}" class="btn btn-outline-success btn-sm float-left mr-1">Edit</a>
                        <a href="#confirmDeleteModal" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal">Delete</a>
                        <a href="/users/manage" class="btn btn-outline-secondary btn-sm mr-1">Manage Users</a>
                        {{-- Confirm Delete Modal --}}
                        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confimModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Confirm" below to delete user</div>
                                <div class="modal-footer d-block">
                                    {!!Form::open(['action'=>['UserController@destroy', $user->id], 'method'=>'POST', 'class'=>'float-left'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Confirm', ['class'=>'btn btn-outline-success btn-sm'])}}
                                    {!!Form::close()!!}
                                    <button class="btn btn-outline-warning btn-sm float-left" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <h3 class="text-center text-capitalize">No user found</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection