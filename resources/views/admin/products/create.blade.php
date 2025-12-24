@extends('admin.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add New Product</h6>
    </div>
    <div class="card-body">
        <form action="{{ url('admin.products') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                     <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Subcategory</label>
                        <select name="subcategory_id" id="subcategory_id" class="form-control">
                            <option value="">Select Subcategory</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="short_description" id="short_description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Discount Price</label>
                        <input type="number" step="0.01" name="discount_price" class="form-control">
                    </div>
                     <div class="form-group">
                        <label>Main Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                     <div class="form-group">
                        <label>Gallery Images</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured">
                            <label class="custom-control-label" for="is_featured">Featured</label>
                        </div>
                    </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_new_arrival" name="is_new_arrival">
                            <label class="custom-control-label" for="is_new_arrival">New Arrival</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
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
