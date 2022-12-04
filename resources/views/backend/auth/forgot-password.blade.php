@extends('backend.auth.layouts.master')
{{-- @section('page_title', 'Login') --}}
@section('content')
    <div class="mb-4 text-sm text-gray">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>
    {!! Form::open( ['method'=>'POST', 'route'=>'password.email'] ) !!}
    {!! Form::label('email', 'Email', ['class'=>'form-label']) !!}
    {!! Form::email('email', null, ['class'=>$errors->has('email') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm']) !!}
    @error('email')
        <p class="text-danger h6">{{ $message }}</p>
    @enderror
    {!! Form::submit('EMAIL PASSWORD RESET LINK', ['type'=>'submit', 'class'=>'form-control btn btn-success mt-3']) !!}
    {!! Form::close() !!}
@endsection