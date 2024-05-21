@extends('layouts.dashboard')

@section('title', 'Donation Requests')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Donation Requests</li>
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
            <th>Patient Name</th>
            <th>Patient Phone</th>
            <th>City</th>
            <th>Hospital Name</th>
            <th>Blood Type</th>
            <th>Age</th>
            <th>Bags Num</th>
            <th>Details</th>
            <th>Hospital Address</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($records as $record)
        <tr>
            <td></td>
            <td>{{ $record->id }}</td>
            <td>{{ $record->patient_name }}</td>
            <td>{{ $record->patient_phone }}</td>
            <td>{{ $record->city->name }}</td>
            <td>{{ $record->hospital_name }}</td>
            <td>{{ $record->bloodType->name}}</td>
            <td>{{ $record->age }}</td>
            <td>{{ $record->bags_num }}</td>
            <td>{{ $record->details }}</td>
            <td>{{ $record->hospital_address }}</td>
            <td>{{ $record->latitude }}</td>
            <td>{{ $record->longitude }}</td>
            <td class="btn-column">
                <div class="btn-group">
                    <form action="{{ route('donation-requests.destroy', $record->id) }}" method="post">
                        @csrf
                        <!-- Form Method Spoofing -->
                        <input type="hidden" name="_method" value="delete">
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="15">No records defined.</td>
        </tr>
        @endforelse
    </tbody>
</table>




</div>

{{-- {{ $records->withQueryString()->appends(['search' => 1])->links() }} --}}
@endsection
