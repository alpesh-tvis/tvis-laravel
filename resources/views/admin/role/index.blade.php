@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Role List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item active">Role list</li>
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
                            <h3 class="card-title">Role List</h3>
                             <a href="{{ route('role.create') }}" class="btn btn-primary">Create Role</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: 10px">Name</th>
                                    <th style="width: 10px">Guard Name</th>
                                   <th style="width: 10px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($roles->count())
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->guard_name  }}</td>
                                    <td class="d-flex">
                                        <a href="" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                                        <a href="" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i> </a>
                                        <form action="" class="mr-1" method="POST">
                                            @method('DELETE')
                                            @csrf 
                                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                                 @endforeach
                                 @else   
                                    <tr>
                                        <td colspan="4">
                                            <h5 class="text-center">No role found.</h5>
                                        </td>
                                    </tr>

                                @endif
                            </tbody>
                        </table>
                        
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-right">
                       <div class="d-flex justify-content-right">
                            {!! $roles->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection