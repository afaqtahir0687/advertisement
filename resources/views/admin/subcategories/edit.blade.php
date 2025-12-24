@extends('admin.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Subcategory</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.subcategories.update', $subcategory->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label>Parent Category <span class="text-danger">*</span></label>
                    <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror" required>
                        <option value="">Select Parent Category</option>
                        @foreach($parent_categories as $parent)
                            <option value="{{ $parent->id }}" {{ $parent->id == $subcategory->parent_id ? 'selected' : '' }}>
                                {{ $parent->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('parent_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Select the parent category for this subcategory</small>
                </div>

                <div class="form-group">
                    <label>Subcategory Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name', $subcategory->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($subcategory->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $subcategory->image) }}" width="150" class="img-thumbnail">
                            <p class="text-muted mt-1"><small>Current image</small></p>
                        </div>
                    @endif
                    <small class="form-text text-muted">Recommended size: 280x280 pixels</small>
                </div>

                <div class="form-group">
                    <label>Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                        <option value="active" {{ $subcategory->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $subcategory->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Subcategory</button>
                <a href="{{ route('admin.subcategories.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
