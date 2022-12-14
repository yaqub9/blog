@extends('backend.layouts.master')
@section('page_title', 'Post')
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
                <h4>Post Details</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-border">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $post->id }}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{ $post->title }}</td>
                        </tr>
                        <tr>
                        <tr>
                            <th>Slug</th>
                            <td>{{ $post->slug }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $post->status == 1 ? 'Active' : 'Inactive'}}</td>
                        </tr>
                        <tr>
                            <th>Is approved</th>
                            <td>{{ $post->is_approved == 1 ? 'Approved' : 'Not Approved'}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! $post->description !!}</td>
                        </tr>
                        <tr>
                            <th>Admin Coment</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{ $post->created_at->toDayDateTimeString() }}</td>
                        </tr>
                        <tr>
                            <th>Updated at</th>
                            <td>{{ $post->created_at != $post->updated_at ? $post->updated_at->toDayDateTimeString() : 'Not Updated'}}</td>
                        </tr>
                        <tr>
                            <th>Deleted at</th>
                            <td>{{ $post->deleted_at != null ? $post->deleted_at->toDayDateTimeString() : 'Not Deleted'}}</td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><img class="post_image" src="{{ '/images/post/original/'. $post->post_img }}" alt=""></td>
                        </tr>
                        <tr>
                            <th>Tag</th>
                            <td>
                                @php
                                $classes = ['btn-success', 'btn-info', 'btn-danger', 'btn-warning', 'btn-danger'];
                            @endphp
                            @foreach ($post->tag as $tag)
                                <a href="{{ route('tag.show', $tag->id) }}"><button class="btn btn-sm {{ $classes[random_int(0, 4)] }}"> {{ $tag->name }} </button></a>
                            @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
           </div>
           <a href="{{ route('post.index') }}"><button class="btn btn-sm btn-success mt-3"><i class="fa-solid fa-arrow-left"></i>  Back</button></a>
       </div>
       <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4>Category Details</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-border">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $post->category_id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $post->category->name }}</td>
                        </tr>
                        <tr>
                            <th>Slug</th>
                            <td>{{ $post->category->slug}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $post->status == 1 ? 'Active' : 'Not Active'}}</td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{ $post->created_at->toDayDateTimeString() }}</td>
                        </tr>
                        <tr>
                            <th>Updated at</th>
                            <td>{{ $post->created_at != $post->updated_at ? $post->updated_at->toDayDateTimeString() : 'Not Updated'}}</td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-sm btn-success" href="{{ route('category.show', $post->category->id) }}">Details</a>
            </div>
           </div>
           <div class="card mt-3">
            <div class="card-header">
                <h4>Sub Category Details</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-border">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $post->SubCategory->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $post->SubCategory->name }}</td>
                        </tr>
                        <tr>
                            <th>Staus</th>
                            <td>{{ $post->SubCategory->status}}</td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{ $post->SubCategory->created_at->toDayDateTimeString() }}</td>
                        </tr>
                        <tr>
                            <th>Updated at</th>
                            <td>{{ $post->SubCategory->created_at != $post->SubCategory->updated_at ? $post->SubCategory->updated_at->toDayDateTimeString() : 'Not Updated'}}</td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-sm btn-success" href="{{ route('sub-category.show', $post->SubCategory->id) }}">Details</a>
            </div>
           </div>
       </div>
    </div>
</div>
@endsection
