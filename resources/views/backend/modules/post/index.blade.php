@extends('backend.layouts.master')
@section('page_title', 'Post')
@section('page_sub_title', 'List')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">@yield('page_title')</h1>
    <ol class="breadcrumb mb-12">
        <li class="breadcrumb-item active">@yield('page_sub_title')</li>
    </ol>
    <div class="row justify-content-center">
       <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Post Details</h4>
                <a href="{{ route('post.create') }}"><button class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i>&nbspCreate</button></a>
            </div>
            <div class="card-body">
             <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>
                            <p>Title</p>
                            <hr>
                            <p>Slug</p>
                        </th>
                        <th>
                            <p>Category</p>
                            <hr>
                            <p>Sub Category</p>
                        </th>
                        <th>
                            <p>Tags</p>
                        </th>
                        <th>
                            <p>Status</p>
                            <hr>
                            <p>Is Approved</p>
                        </th>
                        <th>Post Image</th>
                        <th>
                            <p>Created at</p>
                            <hr>
                            <p>Updated at</p>
                            <hr>
                            <p>Created by</p>
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <p>{{ $i++ }}</p>
                            </td>
                            <td>
                                <p>{{ $post->title }}</p>
                                <hr>
                                <p>{{ $post->slug  }}</p>
                            </td>
                            <td>
                                <p> <a href="{{ route('category.show', $post->category->id) }}">{{ $post->category->name }}</a> </p>
                                <hr>
                                <p> <a href="{{ route('sub-category.show', $post->SubCategory->id) }}">{{ $post->SubCategory->name  }}</a> </p>
                            </td>
                            <td>
                                <p>
                                    @php
                                        $classes = ['btn-success', 'btn-info', 'btn-danger', 'btn-warning', 'btn-danger'];
                                    @endphp
                                    @foreach ($post->tag as $tag)
                                        <button class="btn btn-sm {{ $classes[random_int(0, 4)] }}"> {{ $tag->name }} </button>
                                    @endforeach
                                </p>
                            </td>
                            <td>
                                <p>{{ $post->status == 1 ? 'Active' : 'Not Active' }}</p>
                                <hr>
                                <p>{{ $post->is_approved == 1 ? 'Approved' : 'Not Approved' }} </p>
                             </td>
                            <td><img class="img-thumbnail post-img" data-src="{{ url('/images/post/original/'.$post->post_img) }}" src="{{ '/images/post/thumbnail/'.$post->post_img }}" alt="{{ $post->post_img }}"></td>
                            <td>
                                <p>{{ $post->created_at->toDayDateTimeString() }}</p>
                                <hr>
                                <p>{{ $post->created_at != $post->updated_at? $post->created_at->toDayDateTimeString() : 'Not Updated Yet' }}</p>
                                <hr>
                                <p>{{ $post->user?->name}}</p>
                             </td>
                            <td>
                               <div class="d-flex gap-2">
                                    <a href="{{ route('post.show', $post->id) }}"><button class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></button></i></a>
                                    <a href="{{ route('post.edit', $post->id) }}" ><button class="btn btn-sm btn-success"><i class="fa-solid fa-edit"></i></button></a>
                                    {!! Form::open(['method'=>'delete', 'id'=>'form_'.$post->id, 'route'=>['post.destroy', $post->id]]) !!}
                                    {!! Form::button('<i class="fa-solid fa-edit"></i>', ['class'=>'delete btn btn-sm btn-danger', 'type'=>'button', 'data-id'=>$post->id,]) !!}
                                    {!! Form::close() !!}
                               </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
             </table>
             {{ $posts->links() }}
            </div>
           </div>
       </div>
    </div>
    <!-- Button trigger modal -->
        <button id="image-show-button" type="button" class="d-none" data-bs-toggle="modal" data-bs-target="#image-show"></button>
        <!-- Modal -->
        <div class="modal fade" id="image-show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Blog Post Image</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                     <img class="img-thumbnail" src="" alt="Display Image" id="display_img">
                </div>
            </div>
            </div>
        </div><!-- Modal end-->
</div>
@push('js')
    @if(session()->has('msg'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: '{{ session('cls') }}',
                toast: true,
                title: '{{ session('msg') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
@endpush
@push('js')
    <script>
            $('.delete').on('click', function(){
                let id = $(this).attr('data-id');

                Swal.fire({
                title: 'Are you sure to delete this?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $(`#form_${id}`).submit()
                    // $('#form_'+id).submit()
                }
            })
        })

        $('.post-img').on('click', function(){
            let img = $(this).attr('data-src');
            $('#display_img').attr('src', img);
            $('#image-show-button').trigger( "click" );
        })
    </script>
@endpush
@endsection
