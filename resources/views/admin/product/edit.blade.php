@extends('layouts.admin.master')
@section('title', 'Edit Product - LaCommerce')

@section('styles')

@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$product->category_id == $category->id ? "selected" : ""}}>{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" value="{{$product->title}}">
            </div>
            <div class="mb-3">
                <label for="quantity">Quantity</label>
                <input class="form-control" type="text" name="quantity" value="{{$product->quantity}}">
            </div>
            <div class="mb-3">
                <label for="price">Price</label>
                <input class="form-control" type="text" name="price" value="{{$product->price}}">
            </div>
            <div class="mb-3">
                <label for="discount_price">Discount Price</label>
                <input class="form-control" type="text" name="discount_price" value="{{$product->discount_price}}">
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <input class="form-control" type="text" name="description" value="{{$product->description}}">
            </div>
            <div class="mb-3">
                <label for="image">Cover Image</label>
                <input class="form-control" type="file" name="image">
            </div>
            <div class="mb-3">
                <label for="meta_title">Meta Title</label>
                <input class="form-control" type="text" name="meta_title" value="{{$product->meta_title}}">
            </div>
            <div class="mb-3">
                <label for="meta_description">Meta Description</label>
                <input class="form-control" type="text" name="meta_description" value="{{$product->meta_description}}">
            </div>
            <div class="mb-3">
                <label for="meta_keyword">Meta Keyword</label>
                <input class="form-control" type="text" name="meta_keyword" value="{{$product->meta_keyword}}">
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')

@endsection
