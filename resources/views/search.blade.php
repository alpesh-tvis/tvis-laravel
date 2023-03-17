@extends('layouts.admin')

@section('content')                   
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Product List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product list</li>
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
                            <div>
                                <div class="mx-auto pull-right">
                                    <form action="{{ route('search') }}" method="GET">
                                        <input type="text" name="search" required/>
                                        <button type="submit">Search</button>
                                    </form>
                                </div>
                            </div>
                            <h3 class="card-title">Product List</h3>
                             <a href="{{ route('product.create') }}" class="btn btn-primary">Create Product</a>
                        </div>
                    </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 10px">Name</th>
                        <th style="width: 10px">Slug</th>
                        <th style="width: 10px">Description</th>
                        <th style="width: 10px">Image</th>
                        <th style="width: 10px">Category</th>
                        <th style="width: 10px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($products->isNotEmpty())
                     @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ Str::limit($product->content, 50) }}</td>
                            <td><img src="{{ $product->image }}" height="50px" width="50px"></td>
                            <td>{{ $product->category }}</td>
                            <td class="d-flex">
                                <a href="{{ route('product.show', [$product->id]) }}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('product.edit', [$product->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i> </a>
                                <form action="{{ route('product.destroy', [$product->id]) }}" class="mr-1" method="POST">
                                    @method('DELETE')
                                    @csrf 
                                    <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else    
                        <tr>
                            <td colspan="6">
                                <h5 class="text-center">No products found.</h5>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
     </div>   
    </div>   
  </div>   
</div>   
</div>   
@endsection

@section('script')

@endsection