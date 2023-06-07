@extends('layouts.admin')

@section('title')
    Edit Ads
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ route('admin.ad.update',$ad->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h4>Update Ads</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title1</label>
                            <input type="text" name="title1" value="{{ $ad->title1 }}"
                                class="form-control @error('title1') is-invalid @enderror">
                            @error('title1')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Title2</label>
                            <input type="text" name="title2" value="{{ $ad->title2 }}"
                                class="form-control @error('title2') is-invalid @enderror">
                            @error('title2')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Image (Top)</label>
                            <input type="file" name="img1" class="form-control @error('img1') is-invalid @enderror">
                            <img src="/site/images/ads/{{ $ad->img1 }}" width="150">
                            @error('img1')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Image (Sidebar)</label>
                            <input type="file" name="img2" class="form-control @error('img2') is-invalid @enderror">
                            <img src="/site/images/ads/{{ $ad->img2 }}" alt="">
                            @error('img2')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Url1</label>
                            <input type="text" name="url1" value="{{ $ad->url1 }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Url2</label>
                            <input type="text" name="url2" value="{{ $ad->url2 }}" class="form-control">
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
