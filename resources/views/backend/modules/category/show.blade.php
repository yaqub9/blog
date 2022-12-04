@extends('backend.layouts.master')
@section('page_title', 'Category')
@section('page_sub_title', 'Details')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">@yield('page_title')</h1>
    <ol class="breadcrumb mb-12">
        <li class="breadcrumb-item active">@yield('page_sub_title')</li>
    </ol>
    <div class="row justify-content-center">
       <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Category Details</h4>
                
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-border">
                    <tbody>
                        <tr>
                            <th>SL</th>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $category->name }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $category->status == 1 ? 'Active' : 'Inactive'}}</td>
                        </tr>
                        <tr>
                            <th>Serial</th>
                            <td>{{ $category->order_by }}</td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{ $category->created_at->toDayDateTimeString() }}</td>
                        </tr>
                        <tr>
                            <th>Updated at</th>
                            <td>{{ $category->created_at != $category->updated_at ? $category->updated_at->toDayDateTimeString() : 'Not Updated'}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
           </div>
           <a href="{{ route('category.index') }}"><button class="btn btn-sm btn-success mt-3"><i class="fa-solid fa-arrow-left"></i>  Back</button></a>
       </div>
    </div>
</div>
@endsection