@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Category
                    <a href="{{ url('admin/category') }}" class="text-white btn btn-primary btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">

                <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control" />
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label>Slug</label>
                            <input type="text" name="slug" value="{{$category->slug }}" class="form-control" />
                            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3 col-md-12">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" />
                            <img src="{{ asset('/uploads/category/'. $category->image) }}" width="60px" height="60px" />
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label>Status</label><br>
                            <input type="checkbox" name="status" {{ $category->status ? 'checked' : '' }} />
                        </div>

                        <div class="col-md-12">
                            <h4>SEO TAGS</h4>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control" />
                            @error('meta_title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3 col-md-12">
                            <label>Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control" rows="3">{{ $category->meta_keyword }}</textarea>
                            @error('meta_keyword') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3 col-md-12">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ $category->meta_description }}</textarea>
                            @error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3 col-md-12">
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
