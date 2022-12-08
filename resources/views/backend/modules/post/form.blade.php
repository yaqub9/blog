{!! Form::label('title', 'Title', ['class'=>'form-label']) !!}
{!! Form::text('title', null, ['id'=>'title', 'class'=>'form-control mb-3','placeholder'=>'Enter post title']) !!}
{!! Form::label('slug', 'Slug', ['class'=>'form-label']) !!}
{!! Form::text('slug', null, ['id'=>'slug', 'class'=>'form-control mb-3','placeholder'=>'Enter post slug']) !!}

{!! Form::label('status', 'Post Status', ['class'=>'form-label']) !!}
{!! Form::select('status', [ 1=>'Active', 2 => 'Inactive'], null, ['class'=>'form-select', 'placeholder'=>'Select Status']) !!}
<div class="row">
    <div class="col-md-6">
        {!! Form::label('category_id', 'Select Category', ['class'=> 'form-label mt-3']) !!}
        {!! Form::select('category_id', $categories, null, ['id'=>'category_id', 'class'=>'form-select', 'placeholder'=>'Select Category']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('sub_category_id', 'Select sub Category', ['class'=> 'form-label mt-3']) !!}
        <select class="form-select" name="sub_category_id" id="sub_category_id">
            <option selected disabled>Select Sub Category</option>
        </select>
    </div>
</div>
{!! Form::label('description', 'Description', ['class'=>'form-label mt-3']) !!}
{!! Form::textarea('description', null, ['id'=>'description', 'class'=>'form-control', 'placeholder'=>'Description']) !!}
{!! Form::label('tag_id', 'Select Tag', ['class'=>'form-label mt-3']) !!}
<br>
<div class="row mb-3">
    @foreach ($tags as $tag)
    <div class="col-md-3">
        {!! Form::checkbox('tag_ids[]', $tag->id, false, ) !!} <span>{{ $tag->name }}</span>
    </div>
    @endforeach
</div>
{!! Form::label('post_img', 'Select Post Image', ['class='=>'form-label mt-5']) !!}
{!! Form::file('post_img', ['class'=>'form-control ']) !!}
@push('css')
    <style>
    .ck.ck-editor__main>.ck-editor__editable {
    min-height: 250px;
    }
    </style>
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.1/axios.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        });
    $('#category_id').on('change', function(){
        let category_id = $(this).val()
        let sub_category_element = $('#sub_category_id')
        sub_category_element.empty()
        sub_category_element.append('<option selected disabled>Select Sub Category</option>')
        axios.get(window.location.origin + '/dashboard/get-subcategory/' + category_id).then(res=>{
            let sub_categories = res.data;

            sub_categories.map((sub_category, index)=>(
                sub_category_element.append(`<option value="${sub_category.id}">${sub_category.name}</option>`)
            ))
        })
    })
    // $('#category_id').on('change', function(){
    //     let category_id = $(this).val()
    //     $('#sub_category_id').empty()
    //     $('#sub_category_id').append('<option selected disabled>Select Sub Category</option>')
    //     axios.get(window.location.origin + '/dashboard/get-subcategory/' + category_id).then(res=>{
    //         let sub_categories = res.data;

    //         sub_categories.map((sub_category, index)=>(
    //             $('#sub_category_id').append(`<option value="${sub_category.id}">${sub_category.name}</option>`)
    //         ))
    //     })
    // })
    $('#title').on('input', function(){
        let title = $(this).val()
        let slug = title.replaceAll(' ', '-')
        $('#slug').val(slug.toLowerCase())
    })
    </script>
@endpush
