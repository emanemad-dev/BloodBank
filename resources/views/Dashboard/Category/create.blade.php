@extends('layouts.dashboard')
@section('title', 'Categories')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
@include('partials.error_messege')
<div class="card">
<div style="margin: 50px;">
    {!! Form::open(['route' => 'categories.store']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>



    <div class="form-group text-center">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
</div>
@endsection
