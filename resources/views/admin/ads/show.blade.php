@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4> ADS ID-{{ $ad->id }}</h4>
                        <div class="card-header-form">
                            <a href="{{ route('admin.ad.index') }}" class="btn btn-primary">Back</a>
                          </div>
                    </div>
                    <div class="card-body">
                        <div class="teble-responsive">
                            <table class="table">
                                <tr>
                                    <th>ID</th><td>{{ $ad->id }}</td>
                                </tr>
                                <tr>
                                    <th>Title1</th><td>{{ $ad->title1 }}</td>
                                </tr>
                                <tr>
                                    <th>Title2</th><td>{{ $ad->title2 }}</td>
                                </tr>
                                <tr>
                                    <th>Img (Top)</th><td><img src="/site/images/ads/{{ $ad->img1 }}" width="100"></td>
                                </tr>
                                <tr>
                                    <th>Img (Sidebar)</th><td><img src="/site/images/ads/{{ $ad->img2 }}" width="100"></td>
                                </tr>
                                <tr>
                                    <th>Url1</th><td>{{ $ad->url1 }}</td>
                                </tr>
                                <tr>
                                    <th>Url2</th><td>{{ $ad->url2 }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
