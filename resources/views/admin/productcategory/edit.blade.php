@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Product Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('productcategory.index') }}">Product Category list</a></li>
                    <li class="breadcrumb-item active">Edit Product Category </li>

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
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- <h3 class="card-title">Edit Product Category -  <b>{{ $productcategory->name }}</b></h3> -->
                            <a href="{{ route('productcategory.index') }}" class="btn btn-primary">Go Back to Product CategoryList</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                        
                                <div class="card-body">
                                    <form action="{{ route('productcategory.update', [$productcategory->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf 
                                    @method('PUT')
                                     @include('includes.errors')
                                       <div class="form-group">
                                            <label for="title">Name</label>
                                            <input type="name" name="name" value="{{ $productcategory->name }}" class="form-control" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Product Slug</label>
                                            <input type="slug" name="slug" value="{{ $productcategory->slug }}" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea name="description" id="description" rows="4" class="form-control"
                                                placeholder="Enter description">{{ $productcategory->description }}</textarea>
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
                                                        <img src="{{ $productcategory->image }}" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Update Product Category</button>
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

@section('script')
    <script src="{{ asset('/admin/js/summernote-bs4.min.js') }}"></script>
    <script>
        $('#description').summernote({
            placeholder: 'enter description',
            tabsize: 2,
            height: 300
        });
    </script>
@endsection