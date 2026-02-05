@extends('admin.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Banner</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    @if($banner->image)
                        <img src="{{ asset('storage/' . $banner->image) }}" width="100" class="mt-2">
                    @endif
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $banner->title }}">
                </div>
                <div class="form-group">
                    <label>Link</label>
                    <input type="text" name="link" class="form-control" value="{{ $banner->link }}">
                </div>
                <div class="form-group">
                    <label>Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{ $banner->button_text }}">
                </div>
                <div class="form-group">
                    <label>Position</label>
                    <select name="position" class="form-control">
                        <option value="concept_to_delivery" {{ $banner->position == 'concept_to_delivery' ? 'selected' : '' }}>Concept to Delivery (Homepage)</option>
                        <option value="home_top" {{ $banner->position == 'home_top' ? 'selected' : '' }}>Home Top</option>
                        <option value="sidebar" {{ $banner->position == 'sidebar' ? 'selected' : '' }}>Sidebar</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $banner->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $banner->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection