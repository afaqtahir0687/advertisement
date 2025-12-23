@extends('admin.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">General Settings</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Site Title</label>
                <input type="text" name="site_title" class="form-control" value="{{ \App\Models\Setting::where('key', 'site_title')->value('value') }}">
            </div>
            <div class="form-group">
                <label>Contact Email</label>
                <input type="email" name="contact_email" class="form-control" value="{{ \App\Models\Setting::where('key', 'contact_email')->value('value') }}">
            </div>
            <div class="form-group">
                <label>Contact Phone</label>
                <input type="text" name="contact_phone" class="form-control" value="{{ \App\Models\Setting::where('key', 'contact_phone')->value('value') }}">
            </div>
             <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control">{{ \App\Models\Setting::where('key', 'address')->value('value') }}</textarea>
            </div>
             <div class="form-group">
                <label>Facebook URL</label>
                <input type="text" name="social_facebook" class="form-control" value="{{ \App\Models\Setting::where('key', 'social_facebook')->value('value') }}">
            </div>
             <div class="form-group">
                <label>Twitter URL</label>
                <input type="text" name="social_twitter" class="form-control" value="{{ \App\Models\Setting::where('key', 'social_twitter')->value('value') }}">
            </div>
             <div class="form-group">
                <label>Instagram URL</label>
                <input type="text" name="social_instagram" class="form-control" value="{{ \App\Models\Setting::where('key', 'social_instagram')->value('value') }}">
            </div>
            <button type="submit" class="btn btn-primary">Save Settings</button>
        </form>
    </div>
</div>
@endsection
