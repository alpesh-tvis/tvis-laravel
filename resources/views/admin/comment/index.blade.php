@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Comment List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Comment list</li>
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
                           <!--  <h3 class="card-title">Comment List</h3> -->
                            <a href="{{ route('comment.create') }}" class="btn btn-primary">Create Comment</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped" id="comment_search">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Post ID</th>
                                    <th>Post Name</th>
                                    <th>UserName</th>
                                    <th>Email</th>
                                    <th>Rating</th>
                                    <th style="width: 130px">Created Date</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($comment->count())
                                @foreach ($comment as $commen)
                                   <tr>
                                        <td>{{ $commen->id }}</td>
                                        <td>{{ $commen->post_id }}</td>
                                        <td>{{ $commen->post_name }}</td>
                                        <td>{{ $commen->name }}</td>
                                        <td>{{ $commen->email }}</td>
                                        <!-- <td>{{ $commen->star_rating }}</td> -->
                                        <td>
                                            <div class="rated">
                                               @for($i=1; $i<=$commen->star_rating; $i++)                                                      
                                                 <label class="star-rating-complete" title="text">{{$i}} stars</label>
                                               @endfor
                                           </div>
                                        </td>
                                        <td>{{ $commen->created_at->format('d M, Y') }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('comment.show', [$commen->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                            <a href="" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                            <!-- <a href="" target="_blank" class="btn btn-sm btn-dark mr-1"> <i class="fas fa-link"></i> </a> -->
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
                                            <td colspan="6">
                                                <h5 class="text-center">No Comment found.</h5>
                                            </td>
                                        </tr>
                                    @endif
                              
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-center">
                         {{ $comment->links() }}
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
    $('#comment_search').DataTable({
        
    });

});    
</script>
@endsection
