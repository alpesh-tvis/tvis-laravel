@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">View Product Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('productcategory.index') }}">Product Category list</a></li>
                    <li class="breadcrumb-item active">View Product Category</li>
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
                            <!-- <h3 class="card-title">View Product Category </h3> -->
                            <a href="{{ route('productcategory.index') }}" class="btn btn-primary">Go Back to Product List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-pimary">
                            <tbody>
                                <tr>
                                    <th style="width: 200px">Name</th>
                                    <td>
                                        <div style="max-width: 300px; max-height:300px;overflow:hidden">
                                          {{ $productcategory->name }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Slug</th>
                                    <td>{{ $productcategory->slug }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Content</th>
                                    <td>{{ $productcategory->description }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Image</th>
                                    <td>
                                        <img src="{{ asset($productcategory->image) }}" class="img-fluid" alt="" height="100px" width="100px">  
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Create Date</th>
                                    <td>{{ $productcategory->created_at }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Update Date</th>
                                    <td>{{ $productcategory->updated_at }}</td>
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