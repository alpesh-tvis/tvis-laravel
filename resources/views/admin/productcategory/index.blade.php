@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Product Category List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product Category list</li>
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
                            <!-- <h3 class="card-title">Product Category List</h3> -->
                             <a href="{{ route('productcategory.create') }}" class="btn btn-primary">Create Category Product</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped" id="prod_cate_search">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: 10px">Product Name</th>
                                    <th style="width: 10px">Name</th>
                                    <th style="width: 10px">Slug</th>
                                    <th style="width: 10px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @if($productscategory->count())
                                @foreach ($productscategory as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->product_id  }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('productcategory.show', [$item->id]) }}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('productcategory.edit', [$item->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i> </a>
                                            <form action="{{ route('productcategory.destroy', [$item->id]) }}" class="mr-1" method="POST">
                                                @method('DELETE')
                                                @csrf 
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                               @endforeach
                               @else   
                                    <tr>
                                        <td colspan="6">
                                            <h5 class="text-center">No product category found.</h5>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-right">
                        <div class="d-flex justify-content-right">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function () {
    $('#prod_cate_search').DataTable({
    });

});    
</script>
@endsection
