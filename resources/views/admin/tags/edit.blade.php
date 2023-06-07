@extends('layouts.admin')

@section('title')
    Update Tags
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ route('admin.tags.update',$tag->id) }}" method="post">
                @csrf
                @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h4>Update Tag</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Name (UZ)</label>
                        <input type="text" name="name_uz" value="{{ $tag->name_uz }}" class="form-control @error('name_uz') is-invalid @enderror">
                        @error('name_uz') <div class="invalid-feedback"> {{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Name (RU)</label>
                        <input type="text" name="name_ru" value="{{ $tag->name_ru }}" class="form-control @error('name_uz') is-invalid @enderror">
                        @error('name_ru') <div class="invalid-feedback"> {{ $message }}</div> @enderror
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
