@extends('layouts.admin')

@section('title')
    Update Post
@endsection
@section('css')
<link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ route('admin.posts.update',$post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h4>Update Post</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title (UZ)</label>
                            <input type="text" name="title_uz" value="{{ $post->title_uz }}"
                                class="form-control @error('title_uz') is-invalid @enderror">
                            @error('title_uz')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Title (RU)</label>
                            <input type="text" name="title_ru" value="{{ $post->title_ru }}"
                                class="form-control @error('title_uz') is-invalid @enderror">
                            @error('title_ru')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Body (UZ)</label>
                            <textarea name="body_uz" class="form-control @error('body_uz') is-invalid @enderror">{!! $post->body_uz !!}</textarea>
                            
                            @error('body_uz') <div class="invalid-feedback"> {{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Body (RU)</label>
                            <textarea name="body_ru" class="form-control @error('body_uz') is-invalid @enderror">{!! $post->body_ru !!}</textarea>
                           
                            @error('body_ru')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
                            <img src="/site/images/posts/{{ $post->img }}" width="150" >
                            @error('img')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="custom-select" name="category_id">
                                <option selected=""> select category</option>
                                @foreach ( $categories as $category )
                                <option {{ $post->category_id==$category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name_uz }}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="form-group">
                            <label>Tags</label>
                             <select name="tags[]" id="" class="form-control select2" multiple>
                                @foreach ( $tags as $tag )
                                    <option @if (in_array($tag->id, $post->tags->pluck('id')->toArray())) selected @endif value="{{ $tag->id }}">{{ $tag->name_uz }}</option>
                                @endforeach
                             </select>
                        </div>
                        <div class="form-group">
                            <div class="control-label">Is_special</div>
                            <label class="custom-switch mt-2">
                              <input type="checkbox" name="is_spicial" value="1" {{ $post->is_spicial==1 ? 'checked' : ''}} class="custom-switch-input">
                              <span class="custom-switch-indicator"></span>
                            </label>
                          </div>
                        <div class="form-group">
                            <label>Meta title</label>
                            <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Meta description</label>
                            <input type="text" name="meta_description" value="{{ $post->meta_description }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Meta keywords</label>
                            <input type="text" name="meta_keywords" value="{{ $post->meta_keywords }}" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">update</button>
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
