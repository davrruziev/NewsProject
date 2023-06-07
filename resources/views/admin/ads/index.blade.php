@extends('layouts.admin')

@section('title')
    Ads
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
                    <h4>Ads Table</h4>
                    <div class="card-header-form">
                        @empty($ad)
                            <a href="{{ route('admin.ad.create') }}" class="btn btn-primary">Create</a>
                        @endempty
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Image (TOP)</th>
                                    <th>Image (Sidebar)</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <img src="/site/images/ads/{{ $ad->img1 }}" width="35">
                                    </td>
                                    <td>
                                        <img src="/site/images/ads/{{ $ad->img2 }}" width="35">
                                    </td>
                                    @if (!empty($ad))
                                        <td>
                                            <a href="{{ route('admin.ad.edit', $ad->id) }}" class="btn btn-info">Etid</a>
                                            <a href="{{ route('admin.ad.show', $ad->id) }}" class="btn btn-primary">View</a>
                                            <form style="display: inline-block"
                                                action="{{ route('admin.ad.destroy', $ad->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer text-right">
                    <nav class="d-inline-block">
                       {{ $adss->links() }}
                    </nav>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
