
@extends('layouts.dashboard')

@section('title', 'Cities')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Cities</li>
@endsection
@section('content')

<div >
    <a href="{{ route('cities.create') }}" class="btn btn-sm btn-outline-primary mr-2" target="_self" style="width: 100%">+ New cities</a>
</div>

<x-alert type="success" />
<x-alert type="info" />
<div class="card">
<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Govarnorate</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @forelse($records as $record)
        <tr>
            <td></td>

            <td>{{ $record->id }}</td>
            <td>{{ $record->name }}</td>
            <td>{{ $record->governorate->name}}</td>
            <td>
                <a href="{{ route('cities.edit', $record->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
            </td>
            <td>
                <form action="{{ route('cities.destroy', $record->id) }}" method="post">
                    @csrf
                    <!-- Form Method Spoofing -->
                    <input type="hidden" name="_method" value="delete">
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9">No records defined.</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
{{-- {{ $records->withQueryString()->appends(['search' => 1])->links() }} --}}
@endsection
