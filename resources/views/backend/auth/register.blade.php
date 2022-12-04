@extends('backend.auth.layouts.master')

@section('page_title', 'Register')
@section('content')
    {!! Form::open( ['method'=>'post', 'route'=>'register'] ) !!}
    {!! Form::label('name', 'Name', ['class'=>$errors->has('password') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm mb-3']) !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    @error('name')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    {!! Form::label('email', 'Email', ['class'=>'form-label']) !!}
    {!! Form::email('email', null, ['class'=>$errors->has('password') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm']) !!}
    @error('email')
    <p class="text-danger">{{ $message }}</p>
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
    {!! Form::submit('Register', ['type'=>'submit', 'class'=>'form-control btn btn-success mt-3']) !!}
    {!! Form::close() !!}
    <p class="d-flex justify-content-between mt-3"><span>Already registered? <a href="{{ route('login') }}" class="btn btn-sm btn-info">Login</a></span></p>
@endsection
