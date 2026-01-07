@extends('admin.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Service</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Icon (Class Name)</label>
                    <input type="text" name="icon" class="form-control" value="{{ $service->icon }}">
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $service->title }}" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{ $service->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $service->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $service->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection