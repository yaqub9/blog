@extends('backend.layouts.master')
@section('page_title', 'Post')
@section('page_sub_title', 'Create')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">@yield('page_title')</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">@yield('page_sub_title')</li>
    </ol>
    <div class="row justify-content-center">
       <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4>Post Create</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="card-body">
                {!! Form::open(['method'=>'post', 'route'=>'post.store']) !!}
                @include('backend.modules.post.form')
                {!! Form::submit('Create', ['type'=>'submit', 'class'=>'btn btn-success mt-3']) !!}
                {!! Form::close() !!}
            </div>
           </div>
       </div>
    </div>
</div>
@endsection