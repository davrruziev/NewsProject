@extends('layouts.admin')

@section('title')
    Categories
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>×</span>
                      </button>
                      {{ session('success') }}
                    </div>
                  </div>
                @endif
                <div class="card-header">
                    <h4>Categories Table</h4>
                    <div class="card-header-form">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create</a>
                      </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Name_uz</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ( $categories as $category )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name_uz }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-info">Etid</a>
                                        <a href="{{ route('admin.categories.show',$category->id) }}" class="btn btn-primary">View</a>
                                        <form style="display: inline-block" action="{{ route('admin.categories.destroy',$category->id) }}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                       {{ $categories->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
