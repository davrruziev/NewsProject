@extends('layouts.admin')

@section('title')
    Create Post
@endsection
@section('css')
<link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Create Post</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title (UZ)</label>
                            <input type="text" name="title_uz"
                                class="form-control @error('title_uz') is-invalid @enderror">
                            @error('title_uz')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Title (RU)</label>
                            <input type="text" name="title_ru"
                                class="form-control @error('title_uz') is-invalid @enderror">
                            @error('title_ru')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Body (UZ)</label>
                            <textarea name="body_uz" class="form-control @error('body_uz') is-invalid @enderror"></textarea>
                            
                            @error('body_uz') <div class="invalid-feedback"> {{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Body (RU)</label>
                            <textarea name="body_ru" class="form-control @error('body_uz') is-invalid @enderror"></textarea>
                           
                            @error('body_ru')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
                            @error('img')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="custom-select" name="category_id">
                                <option selected=""> select category</option>
                                @foreach ( $categories as $category )
                                <option value="{{ $category->id }}">{{ $category->name_uz }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <select class="custom-select select2" name="tags[]" multiple>
                                @foreach ( $tags as $tag )
                                <option value="{{ $tag->id }}">{{ $tag->name_uz }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="control-label">Is_special</div>
                            <label class="custom-switch mt-2">
                              <input type="checkbox" name="is_spicial" value="1" class="custom-switch-input">
                              <span class="custom-switch-indicator"></span>
                            </label>
                          </div>
                        <div class="form-group">
                            <label>Meta title</label>
                            <input type="text" name="meta_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Meta description</label>
                            <input type="text" name="meta_description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Meta keywords</label>
                            <input type="text" name="meta_keywords" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
   <script src="/admin/ckeditor/ckeditor.js"></script>
   <script>
      CKEDITOR.replace('body_uz', {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
<script>
    CKEDITOR.replace('body_ru', {
      filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
  });
</script>
<script src="/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>
@endsection
