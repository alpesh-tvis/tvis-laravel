@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <a href="{{ route('post.index') }}">
                <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $postCount }}</h3>
                  <p>Posts</p>
                </div>
                <div class="icon">
                  <i class="fas fa-pen-square"></i>
                </div>
              </div>
              </a>
            </div>
            
           <!-- ./col -->
           <div class="col-lg-2 col-6">
              <!-- small box -->
              <a href="{{ route('comment.index') }}">
                <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php $commentsall = DB::select('select * from review_ratings');
                        $reviewratingsCount = count($commentsall);
                        echo $reviewratingsCount; ?></h3>
                  <p>Comment</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fa fa-comment" aria-hidden="true"></i>
                </div>
              </div>
              </a>
            </div>
           <!-- ./col -->
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <a href="{{ route('category.index') }}">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $categoryCount }}</h3>
                  <p>Categories</p>
                </div>
                <div class="icon">
                  <i class="fas fa-tags"></i>
                </div>
              </div>
             </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <a href="{{ route('tag.index') }}">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $tagCount }}</h3>
                 <p>Tags</p>
                </div>
                <div class="icon">
                  <i class="fas fa-tag"></i>
                </div>
              </div>
              </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <a href="{{ route('user.index') }}">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ $userCount }}</h3>
                  <p>Users</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user"></i>
                </div>
              </div>
             </a>
            </div>
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <a href="{{ route('product.index') }}">
                <div class="small-box bg-info">
                <div class="inner">
                  <h3>
                  <?php $productsall = DB::select('select * from products');
                        $productCount = count($productsall);
                        echo $productCount; ?>
                  </h3>
                  <p>Products</p>
                </div>
                <div class="icon">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <a href="{{ route('productcategory.index') }}">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php $prodcate = DB::select('select * from product_cat ');
                        $prodcateCount = count($prodcate);
                        echo $prodcateCount; ?></h3>
                  <p>Product Categories</p>
                </div>
                <div class="icon">
                  <i class="fa fa-list-alt"></i>
                </div>
              </div>
             </a>
            </div>
            <!-- ./col -->
          </div>
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- <h3 class="card-title">Post List</h3>
                             --><!-- <a href="{{ route('post.index') }}" class="btn btn-primary">Post List</a> -->
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped" id="postsearch">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Author</th>
                                    <th>Created Date</th>
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
                                                <a href="{{ route('post.show', [$post->id]) }}"><img src="{{ asset($post->image) }}" class="img-fluid img-rounded" alt=""></a>
                                            </div>
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>
                                            @foreach($post->tags as $tag) 
                                                <span class="badge badge-primary">{{ $tag->name }} </span>
                                            @endforeach
                                        </td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->created_at->format('d M, Y') }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('post.show', [$post->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                            <a href="{{ route('post.edit', [$post->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
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
                    
                </div>
            </div>
        </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
@endsection
@section('script')
<script>
$(document).ready(function () {
    //$('#postsearch').DataTable();
    $('#postsearch').DataTable( {      
         "searching": true,
         "paging": true, 
         "info": true,         
         "lengthChange":true 
    } );
});  
</script>
@endsection