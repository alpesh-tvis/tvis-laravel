@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">View Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product list</a></li>
                    <li class="breadcrumb-item active">View Product</li>
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
                            <h3 class="card-title">View Post</h3>
                            <a href="{{ route('product.index') }}" class="btn btn-primary">Go Back to Product List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-pimary">
                            <tbody>
                                <tr>
                                    <th style="width: 200px">Name</th>
                                    <td>
                                        <div style="max-width: 300px; max-height:300px;overflow:hidden">
                                           {{ $product->name }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Slug</th>
                                    <td>{{ $product->slug }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Content</th>
                                    <td>{{ $product->content }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Category</th>
                                    <td>{{ $product->category }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Image</th>
                                    <td>
                                        <img src="{{ $product->image }}" class="img-fluid" alt="" height="100px" width="100px">  
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Date</th>
                                    <td>{{ $product->date }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection