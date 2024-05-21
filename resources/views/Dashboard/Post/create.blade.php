@extends('layouts.dashboard')
@section('title', 'Posts')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Posts</li>
@endsection

@section('content')
@include('partials.error_messege')
<div style="margin: 50px;">
    {!! Form::open(['route' => 'posts.store', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Content') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id', 'Category') !!}
        {!! Form::select('category_id', $categories->pluck('name', 'id'), null, ['class' => 'form-control',
        'placeholder' =>
        'Select a category']) !!}
    </div>
    <div class="form-group text-center">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@endsection
