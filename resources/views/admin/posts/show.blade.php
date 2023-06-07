@extends('layouts.admin')

@section('title')
    show
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4> Post ID-{{ $post->id }}</h4>
                    <div class="card-header-form">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="teble-responsive">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <td>{{ $post->id }}</td>
                            </tr>
                            <tr>
                                <th>Title_uz</th>
                                <td>{{ $post->title_uz }}</td>
                            </tr>
                            <tr>
                                <th>Title_ru</th>
                                <td>{{ $post->title_ru }}</td>
                            </tr>
                            <tr>
                                <th>Body_uz</th>
                                <td>{!! $post->body_uz !!}</td>
                            </tr>
                            <tr>
                                <th>Body_ru</th>
                                <td>{!! $post->body_ru !!}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $post->category->name_uz }}</td>
                            </tr>
                            <tr>
                                <th>Tags</th>
                                <td>@foreach ( $post->tags as $tag )
                                    {{ $tag->name_uz }},
                                @endforeach</td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{ $post->slug }}</td>
                            </tr>
                            <tr>
                                <th>Img</th>
                                <td><img src="/site/images/posts/{{ $post->img }}" width="120"></td>
                            </tr>
                            <tr>
                                <th>View</th>
                                <td>{{ $post->view }}</td>
                            </tr>
                            <tr>
                                <th>Is_special</th>
                                <td>{{ $post->is_spicial }}</td>
                            </tr>
                            <tr>
                                <th>Meta_title</th>
                                <td>{{ $post->meta_title }}</td>
                            </tr>
                            <tr>
                                <th>Meta_description</th>
                                <td>{{ $post->meta_description }}</td>
                            </tr>
                            <tr>
                                <th>Meta_keywords</th>
                                <td>{{ $post->meta_keywords }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
