@extends('admin.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
    </div>
    <div class="card-body">
         <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                    </div>
                     <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Subcategory</label>
                        <select name="subcategory_id" id="subcategory_id" class="form-control">
                            <option value="">Select Subcategory</option>
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="short_description" id="short_description" class="form-control">{{ $product->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5">{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" required>
                    </div>
                    <div class="form-group">
                        <label>Discount Price</label>
                        <input type="number" step="0.01" name="discount_price" class="form-control" value="{{ $product->discount_price }}">
                    </div>
                     <div class="form-group">
                        <label>Main Image</label>
                        <input type="file" name="image" class="form-control">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mt-2">
                        @endif
                    </div>
                     <div class="form-group">
                        <label>Gallery Images</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                        @if($product->images)
                            <div class="mt-2">
                                @foreach($product->images as $img)
                                     <img src="{{ asset('storage/' . $img) }}" width="50">
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured" {{ $product->is_featured ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_featured">Featured</label>
                        </div>
                    </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_new_arrival" name="is_new_arrival" {{ $product->is_new_arrival ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_new_arrival">New Arrival</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function(){
        $('#category_id').change(function(){
            var category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url: "{{ route('admin.get-subcategories') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $('#subcategory_id').empty();
                        $('#subcategory_id').append('<option value="">Select Subcategory</option>');
                        $.each(data, function(key, value){
                            $('#subcategory_id').append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }
                });
            } else {
                $('#subcategory_id').empty();
                $('#subcategory_id').append('<option value="">Select Subcategory</option>');
            }
        });
    });
</script>
@endpush
@endsection
