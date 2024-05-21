@extends('layouts.dashboard')

@section('title', 'Settings')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Settings</li>
@endsection
@section('content')

<div class="card">
<x-alert type="success" />
<x-alert type="info" />

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Notification Settings Text</th>
            <th>About App</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Facebook Link</th>
            <th>Twitter Link</th>
            <th>Instagram Link</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        @forelse($records as $record)
        <tr>
            <td></td>
            <td>{{ $record->id }}</td>
            <td>{{ $record->notification_settings_text }}</td>
            <td>{{ $record->about_app }}</td>
            <td>{{ $record->phone }}</td>
            <td>{{ $record->email }}</td>
            <td>{{ $record->facebook_link }}</td>
            <td>{{ $record->twitter_link }}</td>
            <td>{{ $record->instagram_link }}</td>
            <td>
                <a href="{{ route('settings.edit', $record->id) }}" class="btn btn-sm btn-outline-success mr-1">Edit</a>

            </td>
        </tr>
        @empty
        <tr>
            <td colspan="11">No records defined.</td>
        </tr>
        @endforelse
    </tbody>
</table>

</div>

@endsection
