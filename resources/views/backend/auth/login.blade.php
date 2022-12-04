@extends('backend.auth.layouts.master')
@section('page_title', 'Login')
@section('content')
    {!! Form::open( ['method'=>'POST', 'route'=>'login'] ) !!}
    {!! Form::label('email', 'Email', ['class'=>'form-label']) !!}
    {!! Form::email('email', null, ['class'=>$errors->has('email') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm']) !!}
    @error('email')
        <p class="text-danger h6">{{ $message }}</p>
    @enderror
    {!! Form::label('password', 'Password', ['class'=>'form-label']) !!}
    {!! Form::password('password', ['class'=>$errors->has('password') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm']) !!}
    @error('password')
    <p class="text-danger h6">{{ $message }}</p>
    @enderror
    {!! Form::submit('Login', ['type'=>'submit', 'class'=>'form-control btn btn-success mt-3']) !!}
    {!! Form::close() !!}
    <p class="d-flex justify-content-between mt-3"><span>Forgot password? <a href="{{ route('password.request') }}" class="btn btn-sm btn-info">Click Here</a></span><span>Not Registered? <a href="{{ route('register') }}" class="btn btn-sm btn-primary"> Register Here</a></span></p>
@endsection