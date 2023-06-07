@extends('layouts.admin')
     @section('title')
         View
     @endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Tag ID-{{ $tag->id }}</h4>
                        <div class="card-header-form">
                            <a href="{{ route('admin.tags.index') }}" class="btn btn-primary">Back</a>
                          </div>
                    </div>
                    <div class="card-body">
                        <div class="teble-responsive">
                            <table class="table">
                                <tr>
                                    <th>ID</th><td>{{ $tag->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name_uz</th><td>{{ $tag->name_uz }}</td>
                                </tr>
                                <tr>
                                    <th>Name_ru</th><td>{{ $tag->name_ru }}</td>
                                </tr>
                                <tr>
                                    <th>Slug</th><td>{{ $tag->slug }}</td>
                                </tr>
                                <tr>
                                    <th>Created_at</th><td>{{ $tag->created_at }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
