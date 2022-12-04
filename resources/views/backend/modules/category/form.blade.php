{!! Form::label('name', 'Name', ['class'=>'form-label']) !!}
{!! Form::text('name', null, ['id'=>'name', 'class'=>'form-control mb-3','placeholder'=>'Enter Category Name']) !!}
{!! Form::label('slug', 'Slug', ['class'=>'form-label']) !!}
{!! Form::text('slug', null, ['id'=>'slug', 'class'=>'form-control mb-3','placeholder'=>'Enter Category Slug']) !!}
{!! Form::label('order_by', 'Serial', ['class'=>'form-label']) !!}
{!! Form::number('order_by', null, ['class'=>'form-control mb-2', 'placeholder'=>'Enter Category Serial']) !!}
{!! Form::label('status', 'Status', ['class'=>'form-label']) !!}
{!! Form::select('status', [ 1=>'Active', 2 => 'Inactive'], null, ['class'=>'form-select', 'placeholder'=>'Select Status']) !!}