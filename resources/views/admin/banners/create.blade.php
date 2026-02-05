@extends('admin.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Banner</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label>Link</label>
                    <input type="text" name="link" class="form-control">
                </div>
                <div class="form-group">
                    <label>Button Text</label>
                    <input type="text" name="button_text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Position</label>
                    <select name="position" class="form-control">
                        <option value="concept_to_delivery">Concept to Delivery (Homepage)</option>
                        <option value="home_top">Home Top</option>
                        <option value="sidebar">Sidebar</option>
                    </select>
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