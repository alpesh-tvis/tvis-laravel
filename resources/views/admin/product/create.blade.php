@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product list</a></li>
                    <li class="breadcrumb-item active">Create Product</li>
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
                            <h3 class="card-title">Create Product</h3>
                            <a href="{{ route('product.index') }}" class="btn btn-primary">Go Back to Product List</a>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ route('product.store') }}" method="POST" id="productfill" enctype="multipart/form-data">
                                    @csrf
                                     @if(Session::has('flash_message'))
                                            <div class="alert alert-success">
                                                {{ Session::get('flash_message') }}
                                            </div>
                                    @endif
                                    
                                    <div class="card-body">
                                        @include('includes.errors')
                                        
                                        <div class="form-group">
                                            <label for="name">Product name</label>
                                            <input type="name" name="name" value="" class="form-control" placeholder="Enter name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea name="description" id="description" rows="4" class="form-control"
                                                placeholder="Enter description" required></textarea>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputprice">Regular Price</label>
                                            <input type="number" name="regular_price" value="" class="form-control" placeholder="Enter price" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputsaleprice">Sale Price</label>
                                            <input type="number" name="sale_price" value="" class="form-control" placeholder="Enter sale price" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_currency">Product Currency</label>
                                            <select name="currency" id="product_currency" class="form-control">
                                                <option value="" selected>Select Product Currency</option>
                                                <option value="$"  selected>$</option>
                                                <option value="€" selected>€</option>
                                                <option value="₹" selected>₹</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="category">Product Category</label>
                                            <select name="category" id="category" class="form-control">
                                                <option value="" style="display: none" selected>Select Category</option>
                                                @foreach($productcategories as $cname)
                                                <option value="{{ $cname->name }}" data-allow-clear="1"> {{ $cname->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                         

                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="image">
                                                <label class="custom-file-label" for="image" required>Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submit" id="btnprimary" class="btn btn-lg btn-primary">Submit</button>
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

@if(Session::has('message_id'))
<script>
   swal("Greate Job!!","{!!Session::get('message_id')!!}","success",{
   button:"Ok",
   )}; 
</script>
@endif
</div>
@endsection
@section('style')
    <link href="{{ url('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admin/css/summernote-bs4.min.css') }}">
@endsection
 
@section('script')
  
    <script src="{{ asset('/admin/js/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endsection
