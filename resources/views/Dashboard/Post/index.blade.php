@extends('layouts.dashboard')
@section('title', 'Posts')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Posts</li>
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        <div>
            <a href="{{ route('posts.create') }}" class="btn btn-sm btn-outline-primary mr-2" target="_self" style="">+
                New post</a>
        </div>
    </div>
    <div class="card-body">
        <x-alert type="success" />
        <x-alert type="info" />

        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Content</th>
                    <th>Category ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($records as $record)
                <tr>
                    <td></td>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->title }}</td>
                    <td><img src="{{ asset($record->image) }}" ></td>
                    <td>{{ $record->content }}</td>
                    <td>{{ $record->category_id }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $record->id) }}"
                            class="btn btn-sm btn-outline-success mr-1">Edit</a>
                        <form action="{{ route('posts.destroy', $record->id) }}" method="post" style="display: inline;">
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
                    <td colspan="10">No records defined.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- {{ $records->withQueryString()->appends(['search' => 1])->links() }} --}}
    </div>
</div>
@endsection
