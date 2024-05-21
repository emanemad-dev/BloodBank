@extends('layouts.dashboard')

@section('title', 'Governorates')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Governorates</li>
@endsection
@section('content')
<div class="card">
   <div class="card-header">
    <div>
        <a href="{{ route('govarnorates.create') }}" class="btn btn-sm btn-outline-primary mr-2" target="_self"
            style="width: 100%">+ New govarnorate</a>
    </div>
   </div>

    <x-alert type="success" />
    <x-alert type="info" />

    {{-- <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
        <x-form.input name="name" placeholder="Name" class="mx-2" :value="request('name')" />
        <select name="status" class="form-control mx-2">
            <option value="">All</option>
            <option value="active" @selected(request('status')=='active' )>Active</option>
            <option value="archived" @selected(request('status')=='archived' )>Archived</option>
        </select>
        <button class="btn btn-dark mx-2">Filter</button>
    </form> --}}

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
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
                <td>
                    <a href="{{ route('govarnorates.edit', $record->id) }}"
                        class="btn btn-sm btn-outline-success">Edit</a>
                </td>
                <td>
                    <form action="{{ route('govarnorates.destroy', $record->id) }}" method="post">
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
@endsection
