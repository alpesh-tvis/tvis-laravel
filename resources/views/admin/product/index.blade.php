@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->

<!-- Bootstrap CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Product List</h1>
            </div><!-- /.col -->
          


            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product list</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- @if(Session::has('success_destroy'))
        <div class="alert alert-success">
            {{ Session::get('success_destroy') }}
        </div>
@endif -->


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('product.create') }}" class="btn btn-primary">Create Product</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped" id="product_search">
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
                                 @if($products->count())
                                @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td>{{ Str::limit($item->content, 50) }}</td>
                                        <td><img src="{{ $item->image }}" height="50px" width="50px"></td>
                                        <td>{{ $item->category }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('product.show', [$item->id]) }}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('product.edit', [$item->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i> </a>
                                            <!-- <form action="{{ route('product.destroy', [$item->id]) }}" class="mr-1" method="POST">
                                                @method('DELETE')
                                                @csrf 
                                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                            </form> -->
                                            <button class="btn btn-danger btn-flat btn-sm remove-product" data-id="{{ $item->id }}" data-action="{{ route('product.destroy', [$item->id]) }}"> <i class="fas fa-trash"></i></button>

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
    $('#product_search').DataTable({
        processing: true,
        scrollY: 500,
        //scrollX: true,
        lengthMenu: [ [10, 20, 25, -1], [2, 4, 8, "All"] ],
        dom: 'Bfrtip',

        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        
    });

});    
</script>
<script type="text/javascript">
        $("body").on("click",".remove-product",function(){
            var current_object = $(this);
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "error",
                showCancelButton: true,
                dangerMode: true,
                cancelButtonClass: '#DD6B55',
                confirmButtonColor: '#dc3545',
                confirmButtonText: 'Delete!',
            },function (result) {
                if (result) {
                    var action = current_object.attr('data-action');
                    var token = jQuery('meta[name="csrf-token"]').attr('content');
                    var id = current_object.attr('data-id');

                    $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
                    $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
                    $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
                    $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
                    $('body').find('.remove-form').submit();
                }
            });
        });
    </script>


@endsection
