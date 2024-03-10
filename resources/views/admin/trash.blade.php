@extends('layouts.admin.master')
@section('title', 'Transh Data-Elearning')

@section('custome_styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">

@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transh</h1>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="p-3 card shadow rounded">
                    <table id="categoryTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Thumnail</th>
                                <th>Deleted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trashed_categories as $category)
                                <tr>
                                    <td>{{ $category->title }}</td>
                                    <td> <img src="{{ asset('uploads/category/' . $category->image) }}" alt=""
                                            height="40"></td>
                                    <td>{{ $category->deleted_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a onclick="return confirm('Are you sure want to delete this category permanently?')"
                                            href="{{ route('admin.trash.delete' , $category->id) }}"
                                            class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a onclick="return confirm('Are you sure want to restore this category?')"
                                            href="{{ route('admin.trash.restore',$category->id) }}"
                                            class="btn btn-success"><i class="fas fa-trash-restore"></i></a>
                                    </td>

                                </tr>
                            @endforeach


                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('custom_scripts')

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#categoryTable');
    </script>
@endsection
