@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Category ID-{{ $category->id }}</h4>
                        <div class="card-header-form">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Back</a>
                          </div>
                    </div>
                    <div class="card-body">
                        <div class="teble-responsive">
                            <table class="table">
                                <tr>
                                    <th>ID</th><td>{{ $category->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name_uz</th><td>{{ $category->name_uz }}</td>
                                </tr>
                                <tr>
                                    <th>Name_ru</th><td>{{ $category->name_ru }}</td>
                                </tr>
                                <tr>
                                    <th>Slug</th><td>{{ $category->slug }}</td>
                                </tr>
                                <tr>
                                    <th>Created_at</th><td>{{ $category->created_at }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
