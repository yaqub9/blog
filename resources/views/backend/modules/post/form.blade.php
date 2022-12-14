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
        {!! Form::checkbox('tag_ids[]', $tag->id, Route::currentRouteName() =='post.edit' ? in_array($tag->id, $selected_tags) : false ) !!} <span>{{ $tag->name }}</span>
    </div>
    @endforeach
</div>
{!! Form::label('post_img', 'Select Post Image', ['class='=>'form-label mt-5']) !!}
{!! Form::file('post_img', ['class'=>'form-control']) !!}
@if (Route::currentRouteName() =='post.edit')
<div>
    <img class="img-thumbnail post-img" data-src="{{ url('/images/post/original/'.$post->post_img) }}" src="{{ '/images/post/thumbnail/'.$post->post_img }}" alt="{{ $post->post_img }}">
</div>
@endif
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

        const get_sub_categories = (category_id) => {
            let route_name = '{{ Route::currentRouteName() }}';

            let sub_category_element = $('sub_category_id');
            sub_category_element.empty()
            let sub_category_select = '';
            if (route_name != 'post.edit'){
                sub_category_select = 'selected';
            }
            sub_category_element.append(`<option ${sub_category_select}>Select Sub Category</option>`)
            axios.get(window.location.origin + '/dashboard/get-subcategory/' + category_id).then(res=>{
                let sub_categories = res.data;

                sub_categories.map((sub_category, index)=> {
                    let selected = '';
                    if (route_name == 'post.edit'){
                        let sub_category_id = '{{ $post->sub_category_id ?? null }}'
                        if (sub_category_id == sub_category.id){
                            selected='selected';
                        }
                    }
                    return sub_category_element.append(`<option ${selected} value="${sub_category.id}">${sub_category.name}</option>`);
                })
            })
        }

        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        });
    $('#category_id').on('change', function(){
        let category_id = $('#category_id').val();
        get_sub_categories(category_id)
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
    @if (Route::currentRouteName() == 'post.edit')
        <script>
            get_sub_categories( '{{ $post->category_id }}' )
        </script>
    @endif
@endpush
