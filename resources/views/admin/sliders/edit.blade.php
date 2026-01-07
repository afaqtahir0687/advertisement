@extends('admin.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Slider</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    @if($slider->image)
                        <img src="{{ asset('storage/' . $slider->image) }}" width="100" class="mt-2">
                    @endif
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $slider->title }}">
                </div>
                <div class="form-group">
                    <label>Subtitle</label>
                    <input type="text" name="subtitle" class="form-control" value="{{ $slider->subtitle }}">
                </div>
                <div class="form-group">
                    <label>Offer Text</label>
                    <input type="text" name="offer_text" class="form-control" value="{{ $slider->offer_text }}">
                </div>
                <div class="form-group">
                    <label>Link</label>
                    <input type="text" name="link" class="form-control" value="{{ $slider->link }}">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $slider->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $slider->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection