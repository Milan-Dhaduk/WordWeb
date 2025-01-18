@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Categories List</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-5">Add New Category</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>

                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            {{-- @dd($category); --}}

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        @if ($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="100" height="100" class="img-thumbnail">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>

                    <td>
                        <span class="badge bg-{{ $category->status == '1' ? 'success' : 'danger' }}">
                            {{ $category->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('categories.delete', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
</div>
@endsection
