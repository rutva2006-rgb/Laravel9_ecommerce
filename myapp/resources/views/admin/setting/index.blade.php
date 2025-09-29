@extends('layouts.admin')

@section('title','Admin Setting')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">

        @if(session('message'))
            <div class="alert alert-success mb-3">{{ session('message') }}</div>
        @endif

        <form action="{{ url('admin/settings') }}" method="POST">
            @csrf

            {{-- Website Section --}}
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Website Name</label>
                            <input type="text" name="website_name" value="{{ $setting->website_name ?? '' }}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Website URL</label>
                            <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }}" class="form-control" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Page Title</label>
                            <input type="text" name="page_title" value="{{ $setting->page_title ?? '' }}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Meta Keywords</label>
                            <textarea name="meta_keyword" class="form-control" rows="3">{{ $setting->page_title ?? 'meta_keyword' }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ $setting->page_title ?? 'meta_description' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Website Information --}}
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone No. 1 *</label>
                            <input type="text" name="phone1" value="{{ $setting->website_name ?? 'phone1' }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone No. 2</label>
                            <input type="text" name="phone2" value="{{ $setting->website_name ?? 'phone2' }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email Id 1 *</label>
                            <input type="text" name="email1" value="{{ $setting->website_name ?? 'email1' }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email Id 2 (optional)</label>
                            <input type="text" name="email2" value="{{ $setting->website_name ?? 'email2' }}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Social Media Section --}}
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Social Media</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Facebook</label>
                            <input type="text" name="facebook"value="{{ $setting->facebook ?? 'email2' }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Twitter</label>
                            <input type="text" name="twitter" value="{{ $setting->twitter ?? 'email2' }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Instagram</label>
                            <input type="text" name="instagram" value="{{ $setting->instagram ?? 'email2' }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Youtube</label>
                            <input type="text" name="youtube" value="{{ $setting->youtube ?? 'email2' }}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="text-end">
                <button type="submit" class="btn btn-primary text-white">
                    Save Settings
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
