@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product list</a></li>
                    <li class="breadcrumb-item active">Edit Product </li>

                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                 <!-- @if(Session::has('success_update'))
                    <div class="alert alert-success">
                        {{ Session::get('success_update') }}
                    </div>
                    @endif -->
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center product-flex">
                            <h3 class="card-title productname"> {{ $product->name }}</h3>
                        </div>
                        <a href="{{ route('product.index') }}" class="btn btn-primary titlebar">Go Back to Product List</a>
                    </div>

                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                        
                                <div class="card-body">
                                    <form action="{{ route('product.update', [$product->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf 
                                    @if(Session::has('success_update'))
                                            <div class="alert alert-success">
                                                {{ Session::get('success_update') }}
                                            </div>
                                    @endif
                                    @method('PUT')
                                     @include('includes.errors')
                                       <div class="form-group">
                                            <label for="title">Product Name</label>
                                            <input type="name" name="name" value="{{ $product->name }}" class="form-control" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Product Slug</label>
                                            <input type="slug" name="slug" value="{{ $product->slug }}" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea name="content" id="content" rows="4" class="form-control"
                                                placeholder="Enter content">{{ $product->content }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputprice">Regular Price</label>
                                            <input type="number" name="regular_price" value="{{ $product->regular_price }}" class="form-control" placeholder="Enter price" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputsaleprice">Sale Price</label>
                                            <input type="number" name="sale_price" value="{{ $product->sale_price }}" class="form-control" placeholder="Enter sale price" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_currency">Product Currency</label>
                                            <input type="currency" name="currency" value="{{ $product->currency }}" class="form-control" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <input type="name" name="category" value="{{ $product->category }}" class="form-control" placeholder="Enter category">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-8">
                                                    <label for="image">Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input" id="image">
                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <div style="max-width: 100px; max-height: 100px;overflow:hidden; margin-left: auto">
                                                        <img src="{{ $product->image }}" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Update Product</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/admin/css/summernote-bs4.min.css') }}">
@endsection

