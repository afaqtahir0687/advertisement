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
                    <label>Position</label>
                    <input type="text" name="position" class="form-control" value="{{ $banner->position }}">
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