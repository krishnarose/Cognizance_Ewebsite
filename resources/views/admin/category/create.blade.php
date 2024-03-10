@extends('layouts.admin.master')

@section('title', 'create-category Ewebsite')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Category</h1>
        <a href="{{route('admin.categories')}} "class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> View All Categories</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.category.store') }}" method="post" class="card shadow rounded p-3"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="md-3">
                        <label for="">Category Title</label>
                        <input class="form-control" type="text" name="title">
                    </div>
                    <div class="md-3">
                        <label for="">Category Description</label>
                        <input class="form-control" type="text"name="description">
                    </div>
                    <div class="md-3">
                        <label for="">Slug</label>
                        <input class="form-control" type="text"name="slug">
                    </div>
                    <div class="md-3">
                        <label for="">Category Thumbnail</label>
                        <input class="form-control" type="file"name="image">
                    </div>
                    <div class="md-3">
                        <label for="">Meta Category Title</label>
                        <input class="form-control" type="text"name="meta_title">
                    </div>
                    <div class="md-3">
                        <label for="">Meta Category Description</label>
                        <input class="form-control" type="text"name="meta_description">
                    </div>
                    <div class="md-3">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
