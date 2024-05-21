@extends('layouts.dashboard')

@section('title', 'Edit City')

@section('breadcrumb')
@parent
<li class="breadcrumb-item">Cities</li>
<li class="breadcrumb-item active">Edit City</li>
@endsection

@section('content')
@include('partials.error_messege')
<div class="card">
<div style="margin: 50px;">
   {!! Form::open( ['route' => ['cities.update', $record->id], 'method' => 'PUT']) !!}
<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', $record->name, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('governorate', 'Governorate') !!}
    {!! Form::text('governorate_id', $record->governorate_id, ['class' => 'form-control']) !!}
</div>


<div class="form-group text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
</div>
</div>
@endsection
