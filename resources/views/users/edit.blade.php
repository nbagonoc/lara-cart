@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 mb-3">
            @include("partials.sidebar")
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>
                <div class="card-body">
                    {!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST']) !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {{Form::label('name', 'Name')}}
                            {{Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'Enter the Title'])}}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('role', 'Role')}}
                            {{Form::select('role', ['moderator' => 'Moderator', 'user' => 'User'], $user->role, ['class'=>'form-control'])}}
                        </div>
                    </div>
                    {{Form::hidden('_method','PATCH')}}
                    {{Form::submit('Edit', ['class'=>'btn btn-outline-success btn-sm'])}}
                    <a href="/users/show/{{$user->id}}" class="btn btn-outline-danger btn-sm">Cancel</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection