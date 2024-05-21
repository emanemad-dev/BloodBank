@extends('layouts.dashboard')
@section('title', 'Governorates')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Governorates</li>
@endsection

@section('content')
@include('partials.error_messege')

<div class="card">
    <div style="margin: 50px;">
        {!! Form::open( ['route' => ['govarnorates.update', $record->id], 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', $record->name, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group text-center">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
