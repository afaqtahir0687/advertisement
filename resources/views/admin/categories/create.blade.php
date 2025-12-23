@extends('admin.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add New Category</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Starting Price (SAR)</label>
                <input type="number" step="0.01" name="price" class="form-control">
            </div>
             <div class="form-group">
                <label>Old Price (SAR) (Optional)</label>
                <input type="number" step="0.01" name="old_price" class="form-control">
            </div>
            <div class="form-group">
                <label>Badge Text (e.g. HOT, -20%)</label>
                <input type="text" name="badge_text" class="form-control">
            </div>
            <div class="form-group">
                <label>Badge Style</label>
                <select name="badge_style" class="form-control">
                    <option value="">None</option>
                    <option value="label-hot">Green (HOT)</option>
                    <option value="label-sale">Red (Sale/-20%)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Main Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label>Hover Image (Optional)</label>
                <input type="file" name="hover_image" class="form-control">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
