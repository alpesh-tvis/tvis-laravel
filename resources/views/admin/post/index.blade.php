@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Post List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Post list</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- <h3 class="card-title">Post List</h3> -->
                            <a href="{{ route('post.create') }}" class="btn btn-primary">Create Post</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0 table_row">
                        <table class="table table-striped display" id="postsearch" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Author</th>
                                    <th style="width: 130px">Created Date</th>
                                    <th>Category Created Date</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($posts->count())
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>
                                            <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                <img src="{{ asset($post->image) }}" class="img-fluid img-rounded" alt="">
                                            </div>
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>
                                            <?php /*echo "<pre>"; print_r($post->tags); echo "<pre>"; die();*/ ?>
                                            @foreach($post->tags as $tag) 
                                              @if (!empty($post->tags))
                                                 @if (!empty($tag->id))
                                                   <span class="badge badge-primary">{{ $tag->name }} </span>
                                                 @endif  
                                              @endif  
                                            @endforeach
                                        </td>
                                        <td>{{ $post->user->name }}</td>
                                        <td style="width: 130px">{{ $post->created_at->format('d M, Y') }}</td>
                                        <td style="width: 130px">{{ $post->category->created_at->format('d M, Y') }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('post.show', [$post->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                            <a href="{{ route('post.edit', [$post->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                            <a href="{{ route('website.post', [$post->slug]) }}" target="_blank" class="btn btn-sm btn-dark mr-1"> <i class="fas fa-link"></i></a>
                                            <form action="{{ route('post.destroy', [$post->id]) }}" class="mr-1" method="POST">
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
                                            <h5 class="text-center">No posts found.</h5>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-center">
                        <!-- {{ $posts->links() }} -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"> -->

@endsection
@section('script')


 <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script> -->


 <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script> -->
 
<script>
$(document).ready(function () {
    $('#postsearch').DataTable({
        processing: true,
        scrollY: 500,
        scrollX: true,
        lengthMenu: [ [10, 20, 25, -1], [2, 4, 8, "All"] ],
        dom: 'Bfrtip',

        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        
    });

});    
</script>
@endsection

