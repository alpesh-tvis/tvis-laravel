@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">View Comment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('comment.index') }}">Comment list</a></li>
                    <li class="breadcrumb-item active">View Comment</li>
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
                            <!-- <h3 class="card-title">View Comment</h3> -->
                            <a href="{{ route('comment.index') }}" class="btn btn-primary">Go Back to comment List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-pimary">
                            <tbody>
                                <tr>
                                    <th style="width: 200px">Post ID</th>
                                    <td>
                                        <div style="max-width: 300px; max-height:300px;overflow:hidden">
                                          {{ $comment->post_id }}
                                        </div>
                                    </td>
                                </tr> 
                                <tr>
                                    <th style="width: 200px">PostName</th>
                                    <td>
                                        <div style="max-width: 300px; max-height:300px;overflow:hidden">
                                          {{ $comment->post_name }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">UserName</th>
                                    <td>{{ $comment->name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Email</th>
                                    <td>{{ $comment->email }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Phone</th>
                                    <td>{{ $comment->phone }}</td>
                                </tr>
                                 <tr>
                                    <th style="width: 200px">Comments</th>
                                    <td>{{ $comment->comments }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Star Rating</th>
                                    <!-- <td>{{ $comment->star_rating }}</td> -->
                                    <td>
                                        <div class="rated">
                                           @for($i=1; $i<=$comment->star_rating; $i++)                                                      
                                             <label class="star-rating-complete" title="text">{{$i}} stars</label>
                                           @endfor
                                       </div>
                                    </td>
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