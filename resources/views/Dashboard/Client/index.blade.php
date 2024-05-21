@extends('layouts.dashboard')

@section('title', 'Clients')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Clients</li>
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
            <th>Phone</th>
            <th>Email</th>
            <th>is_active</th>
            <th>Date of Birth</th>
            <th>City ID</th>
            <th>Blood Type ID</th>
            {{-- <th>Pin Code</th> --}}
            {{-- <th>Password</th> --}}
            <th>Last Donation Rate</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($records as $record)
        <tr>
            <td></td>
            <td>{{ $record->id }}</td>
            <td>{{ $record->name }}</td>
            <td>{{ $record->phone }}</td>
            <td>{{ $record->email }}</td>
            <td>{{ $record->is_active }}</td>
            <td>{{ $record->d_o_b }}</td>
            <td>{{ $record->city_id }}</td>
            <td>{{ $record->blood_type_id }}</td>
            {{-- <td>{{ $record->pin_code }}</td> --}}
            {{-- <td>{{ $record->passowrd }}</td> --}}
            <td>{{ $record->last_donation_rate }}</td>
            <td>
                {{-- <a href="{{ route('clients.edit', $record->id) }}" class="btn btn-sm btn-outline-success">Edit</a> --}}
                <form action="{{ route('clients.destroy', $record->id) }}" method="post" style="display: inline;">
                    @csrf
                    <!-- Form Method Spoofing -->
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
                <!-- Activate button -->
                <form action="{{ route('clients.activate', $record->id) }}" method="post" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-primary">Activate</button>
                </form>
                <!-- Deactivate button -->
                <form action="{{ route('clients.deactivate', $record->id) }}" method="post" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-warning">Deactivate</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="10">No records defined.</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
{{-- {{ $records->withQueryString()->appends(['search' => 1])->links() }} --}}
@endsection
