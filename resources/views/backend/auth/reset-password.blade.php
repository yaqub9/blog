@extends('backend.auth.layouts.master')
@section('content')
    {!! Form::open( ['method'=>'POST', 'route'=>'password.store'] ) !!}
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    {!! Form::label('email', 'Email', ['class'=>'form-label']) !!}
    {!! Form::email('email', $request->email, ['class'=>$errors->has('email') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm']) !!}
    @error('email')
        <p class="text-danger h6">{{ $message }}</p>
    @enderror
    {!! Form::label('password', 'Password', ['class'=>'form-label']) !!}
    {!! Form::password('password', ['class'=>$errors->has('password') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm']) !!}
    @error('password')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    {!! Form::label('password_confirmation', 'Confirm Password', ['class'=>'form-label']) !!}
    {!! Form::password('password_confirmation', ['class'=>$errors->has('password') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm']) !!}
    @error('password_confirmation')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    {!! Form::submit('Reset Password', ['type'=>'submit', 'class'=>'form-control btn btn-success mt-3']) !!}
    {!! Form::close() !!}
@endsection