@extends('layouts.dashboard')

@section('title', 'Contacts')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Contacts</li>
@endsection
@section('content')


<x-alert type="success" />
<x-alert type="info" />
<div class="card">
<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($records as $record)
        <tr>
            <td></td>
            <td>{{ $record->id }}</td>
            <td>{{ $record->name }}</td>
            <td>{{ $record->email }}</td>
            <td>{{ $record->phone }}</td>
            <td>{{ $record->subject }}</td>
            <td>{{ $record->messege }}</td>
            <td>
                <form action="{{ route('contacts.destroy', $record->id) }}" method="post" style="display: inline;">
                    @csrf
                    <!-- Form Method Spoofing -->
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8">No records defined.</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection
