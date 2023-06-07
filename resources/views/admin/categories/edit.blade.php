@extends('layouts.admin')

@section('title')
    Edit Category
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ route('admin.categories.update',$category->id) }}" method="post">
                @csrf
                @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Name (UZ)</label>
                        <input type="text" name="name_uz" value="{{ $category->name_uz }}" class="form-control @error('name_uz') is-invalid @enderror">
                        @error('name_uz') <div class="invalid-feedback"> {{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Name (RU)</label>
                        <input type="text" name="name_ru" value="{{ $category->name_ru }}" class="form-control @error('name_uz') is-invalid @enderror">
                        @error('name_ru') <div class="invalid-feedback"> {{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Meta title</label>
                        <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Meta description</label>
                        <input type="text" name="meta_description" value="{{ $category->meta_description }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Meta keywords</label>
                        <input type="text" name="meta_keywords" value="{{ $category->meta_keywords }}" class="form-control">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Update</button>
                </div>
            </div>
        </form>
        </div>
    </div>
   
    @endsection
