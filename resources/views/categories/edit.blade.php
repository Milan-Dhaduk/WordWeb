@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Category</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $category->title) }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            @if($category->image)
                <div>
                    <strong>Current Image:</strong><br>
                    <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="100">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <div>
                <input type="radio" name="status" value="1" {{ old('status', $category->status) == '1' ? 'checked' : '' }}> Active
                <input type="radio" name="status" value="0" {{ old('status', $category->status) == '0' ? 'checked' : '' }}> Inactive
            </div>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
