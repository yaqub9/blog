@extends('backend.layouts.master')
@section('page_title', 'Sub Category')
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
                <h4>Sub Category Details</h4>
                <a href="{{ route('sub-category.create') }}"><button class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i>&nbspCreate</button></a>
            </div>
            <div class="card-body">
             <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Category Name</th>
                        <th>Serial Number</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($sub_category as $cat)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->slug }}</td>
                            <td>{{ $cat->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>{{ $cat->category->name }}</td>
                            <td>{{ $cat->order_by }}</td>
                            <td> {{ $cat->created_at->toDayDateTimeString() }} </td>
                            <td> {{ $cat->created_at != $cat->updated_at ? $cat->updated_at->toDayDateTimeString() : 'Not Updated'}} </td>
                            <td>
                               <div class="d-flex gap-2">
                                    <a href="{{ route('sub-category.show', $cat->id) }}"><button class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></button></i></a>
                                    <a href="{{ route('sub-category.edit', $cat->id) }}" ><button class="btn btn-sm btn-success"><i class="fa-solid fa-edit"></i></button></a>
                                    {!! Form::open(['method'=>'delete', 'id'=>'form_'.$cat->id, 'route'=>['sub-category.destroy', $cat->id]]) !!}
                                    {!! Form::button('<i class="fa-solid fa-edit"></i>', ['class'=>'delete btn btn-sm btn-danger', 'type'=>'button', 'data-id'=>$cat->id,]) !!}
                                    {!! Form::close() !!}
                               </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
             </table>
            </div>
           </div>
       </div>
    </div>
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
    </script>
@endpush
@endsection