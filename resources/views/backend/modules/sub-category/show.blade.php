@extends('backend.layouts.master')
@section('page_title', 'Sub Category')
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
                <h4>Sub Category Details</h4>
                
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-border">
                    <tbody>
                        <tr>
                            <th>SL</th>
                            <td>{{ $subCategory->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $subCategory->name }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $subCategory->status == 1 ? 'Active' : 'Inactive'}}</td>
                        </tr>
                        <tr>
                            <th>Serial</th>
                            <td>{{ $subCategory->order_by }}</td>
                        </tr>
                        <tr>
                        <tr>
                            <th>Category Name</th>
                            <td>{{ $subCategory->category->name }}</td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{ $subCategory->created_at->toDayDateTimeString() }}</td>
                        </tr>
                        <tr>
                            <th>Updated at</th>
                            <td>{{ $subCategory->created_at != $subCategory->updated_at ? $subCategory->updated_at->toDayDateTimeString() : 'Not Updated'}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
           </div>
           <a href="{{ route('sub-category.index') }}"><button class="btn btn-sm btn-success mt-3"><i class="fa-solid fa-arrow-left"></i>  Back</button></a>
       </div>
    </div>
</div>
@endsection