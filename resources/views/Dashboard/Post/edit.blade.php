@extends('layouts.dashboard')
@section('title', 'Posts')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Posts</li>
@endsection

@section('content')
@include('partials.error_messege')

<div style="margin: 50px;">
    {!! Form::open([
    'route' => ['posts.update', $record->id],
    'method' => 'PUT',
    'files' => true
    ]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', $record->title, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Content') !!}
        {!! Form::textarea('content', $record->content, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id', 'Category') !!}
        {!! Form::select('category_id', $categories, $record->category_id, ['class' => 'form-control', 'placeholder' =>
        'Select a category']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('client_id', 'Client') !!}
        {!! Form::select('client_id', $clients, $record->client_id, ['class' => 'form-control', 'placeholder' => 'Select
        a
        client']) !!}
    </div>

    <div class="form-group text-center">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@endsection



