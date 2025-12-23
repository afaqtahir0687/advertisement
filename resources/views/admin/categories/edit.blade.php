@extends('admin.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <div class="form-group">
                <label>Badge Text (e.g. HOT, -20%)</label>
                <input type="text" name="badge_text" class="form-control" value="{{ $category->badge_text }}">
            </div>
            <div class="form-group">
                <label>Badge Style</label>
                <select name="badge_style" class="form-control">
                    <option value="" {{ $category->badge_style == '' ? 'selected' : '' }}>None</option>
                    <option value="label-hot" {{ $category->badge_style == 'label-hot' ? 'selected' : '' }}>Green (HOT)</option>
                    <option value="label-sale" {{ $category->badge_style == 'label-sale' ? 'selected' : '' }}>Red (Sale/-20%)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Main Image</label>
                <input type="file" name="image" class="form-control">
                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" width="100" class="mt-2">
                @endif
            </div>
             <div class="form-group">
                <label>Hover Image (Optional)</label>
                <input type="file" name="hover_image" class="form-control">
                @if($category->hover_image)
                    <img src="{{ asset('storage/' . $category->hover_image) }}" width="100" class="mt-2">
                @endif
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
