@extends('layouts.dashboard')
@inject('model', 'App\Models\Governorate')

@section('title', 'Categories')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
@include('partials.error_messege')
<div class="card">
<div style="margin: 50px;">
  {!! Form::open(['route' => ['settings.update', $record->id], 'method' => 'PUT']) !!}
<div class="form-group">
    {!! Form::label('notification_settings_text', 'Notification Settings Text') !!}
    {!! Form::text('notification_settings_text', $record->notification_settings_text, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('about_app', 'About App') !!}
    {!! Form::text('about_app', $record->about_app, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('phone', 'Phone') !!}
    {!! Form::text('phone', $record->phone, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', $record->email, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('facebook_link', 'Facebook Link') !!}
    {!! Form::text('facebook_link', $record->facebook_link, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('twitter_link', 'Twitter Link') !!}
    {!! Form::text('twitter_link', $record->twitter_link, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('instagram_link', 'Instagram Link') !!}
    {!! Form::text('instagram_link', $record->instagram_link, ['class' => 'form-control']) !!}
</div>

<div class="form-group text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
</div>
</div>
@endsection
