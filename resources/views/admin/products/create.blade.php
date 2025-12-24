@extends('admin.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add New Product</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" name="sku" class="form-control">
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
                        <textarea name="short_description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5"></textarea>
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
                        <label>Delivery Day(s)</label>
                        <input type="number" name="delivery_days" class="form-control" value="1">
                    </div>
                    <div class="form-group">
                        <label>Production Day(s) (Regular)</label>
                        <input type="number" name="production_days" class="form-control" value="3">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Flexible Rate (per 100)</label>
                                <input type="number" step="0.01" name="flexible_rate" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Flexible Days</label>
                                <input type="number" name="flexible_production_days" class="form-control" value="5">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Urgent Rate (per 100)</label>
                                <input type="number" step="0.01" name="urgent_rate" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Urgent Days</label>
                                <input type="number" name="urgent_production_days" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6>Customization Options (Comma separated)</h6>
                    <div class="form-group">
                        <label>Materials</label>
                        <input type="text" name="materials" class="form-control" placeholder="e.g. 200 coated Matt, 250 coated Gloss">
                    </div>
                    <div class="form-group">
                        <label>Sizes</label>
                        <input type="text" name="sizes" class="form-control" placeholder="e.g. B-Cards, A4">
                    </div>
                    <div class="form-group">
                        <label>Side 1 Colors</label>
                        <input type="text" name="side_1_colors" class="form-control" placeholder="e.g. CMYK, Black & White">
                    </div>
                    <div class="form-group">
                        <label>Sides Options</label>
                        <input type="text" name="sides_options" class="form-control" placeholder="e.g. 1, 2">
                    </div>
                    <div class="form-group">
                        <label>Lamination Types</label>
                        <input type="text" name="lamination_types" class="form-control" placeholder="e.g. Matte, Gloss">
                    </div>
                    <div class="form-group">
                        <label>Die Cutting Options</label>
                        <input type="text" name="die_cutting_options" class="form-control" placeholder="e.g. Custom, Ready Die">
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
</script>
@endpush
@endsection
