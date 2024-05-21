@extends('layouts.dashboard')
@section('title', 'Cities')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Cities</li>
@endsection

@section('content')
@include('partials.error_messege')
<div class="card">
<div style="margin: 50px;">
    {!! Form::open(['route' => 'cities.store']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('governorate', 'Governorate') !!}
        {!! Form::text('governorate_id', null, ['class' => 'form-control']) !!}
    </div>


    <div class="form-group text-center">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
</div>
@endsection
