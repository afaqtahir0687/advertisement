@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-8">
                <!-- General Information -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info-circle mr-1"></i> General Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="font-weight-bold">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="font-weight-bold">SKU</label>
                                    <input type="text" name="sku" class="form-control" placeholder="SKU code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Category <span class="text-danger">*</span></label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Subcategory</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                                        <option value="">Select Subcategory</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Descriptions -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-align-left mr-1"></i> Content & Descriptions</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-bold">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="2" placeholder="Brief overview of the product"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Full Description</label>
                            <textarea name="description" class="form-control" rows="5" placeholder="Detailed product specifications"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Size Guide</label>
                                    <textarea name="size_guide" class="form-control" rows="3" placeholder="HTML or text for size guide"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Additional Info</label>
                                    <textarea name="additional_info" class="form-control" rows="3" placeholder="Technical/Shipping details"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customization Options -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-tags mr-1"></i> Customization Options (Comma separated)</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Materials</label>
                                    <input type="text" name="materials" class="form-control" placeholder="e.g. Matt, Gloss">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Sizes</label>
                                    <input type="text" name="sizes" class="form-control" placeholder="e.g. B-Cards, A4">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Side 1 Colors</label>
                                    <input type="text" name="side_1_colors" class="form-control" placeholder="e.g. CMYK">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Sides Options</label>
                                    <input type="text" name="sides_options" class="form-control" placeholder="e.g. 1, 2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Lamination Types</label>
                                    <input type="text" name="lamination_types" class="form-control" placeholder="e.g. Matte Lamination">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Die Cutting</label>
                                    <input type="text" name="die_cutting_options" class="form-control" placeholder="e.g. Custom, Ready">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-8">
                                <div class="form-group">
                                    <label class="font-weight-bold">Allowed Quantities (Comma separated)</label>
                                     <input type="text" name="quantities" class="form-control" placeholder="e.g. 100, 250, 500, 1000">
                                     <small class="form-text text-muted">Leave empty to use default quantities.</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mt-4">
                                    <div class="custom-control custom-checkbox">
                                         <input type="checkbox" class="custom-control-input" id="allow_custom_quantity" name="allow_custom_quantity" checked>
                                         <label class="custom-control-label font-weight-bold" for="allow_custom_quantity">Allow Custom Quantity</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-4">
                <!-- Pricing & Urgency -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-money-bill-wave mr-1"></i> Pricing & Delivery</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-bold">Base Price <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Discount Price</label>
                            <input type="number" step="0.01" name="discount_price" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="font-weight-bold small">Production (Reg)</label>
                                    <input type="number" name="production_days" class="form-control" value="3">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="font-weight-bold small">Delivery</label>
                                    <input type="number" name="delivery_days" class="form-control" value="1">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="font-weight-bold small">Flex Rate</label>
                                    <input type="number" step="0.01" name="flexible_rate" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="font-weight-bold small">Flex Days</label>
                                    <input type="number" name="flexible_production_days" class="form-control" value="5">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="font-weight-bold small">Urgent Rate</label>
                                    <input type="number" step="0.01" name="urgent_rate" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="font-weight-bold small">Urgent Days</label>
                                    <input type="number" name="urgent_production_days" class="form-control" value="1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Media & Settings -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-cog mr-1"></i> Media & Visibility</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-bold">Main Image <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control-file border p-1 rounded w-100" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Gallery Images</label>
                            <input type="file" name="images[]" class="form-control-file border p-1 rounded w-100" multiple>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured">
                                <label class="custom-control-label font-weight-bold" for="is_featured">Featured Product</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_new_arrival" name="is_new_arrival">
                                <label class="custom-control-label font-weight-bold" for="is_new_arrival">New Arrival</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_wishlist" name="is_wishlist">
                                <label class="custom-control-label font-weight-bold" for="is_wishlist">Show in Wishlist</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Status</label>
                            <select name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg mt-4"><i class="fas fa-save mr-1"></i> Create Product</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
