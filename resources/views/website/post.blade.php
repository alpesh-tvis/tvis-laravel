@extends('layouts.website')
@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url('{{ url($post->image) }}');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <span class="post-category text-white bg-success mb-3">{{ $post->category->name }}</span>
                    <h1 class="mb-4"><a href="javascript:void()">{{ $post->title }}</a></h1>
                    <div class="post-meta align-items-center text-center">
                        <figure class="author-figure mb-0 mr-3 d-inline-block">
                            <!-- <img src="@if($post->user->image) {{ $post->user->image }} @else {{ asset('website/images/user.png') }} @endif" alt="Image" class="img-fluid"> -->

                            @if($post->user->image)
                            <img src="{{ url($post->user->image) }}" alt="" class="img-fluid">
                            @else 
                            <img src="{{ asset('website/images/user.png') }}" alt="" class="img-fluid">
                            @endif
                            
                        </figure>
                        <span class="d-inline-block mt-1">By {{ $post->user->name }}</span>
                        <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section py-lg">
    <div class="container">
        <div class="row blog-entries element-animate">
            <div class="col-md-12 col-lg-8 main-content">
                <div class="post-content-body">
                    {!! $post->description !!}
                </div>
                <div class="pt-5">
                    <p>
                        Categories: <a href="#">{{ $post->category->name }}</a> 
                        @if($post->tags()->count() > 0)
                        Tags: 
                            @foreach($post->tags as $tag)
                                <a href="{{ route('website.tag', ['slug' => $tag->slug]) }}">#{{ $tag->name }}</a>, 
                            @endforeach
                        @endif
                    </p>
                </div>
                <div class="pt-5">
                    <h3 class="mb-5" id="dsq-count-scr">Comments</h3>
                    <!-- <a href="{{ route('website.post', ['slug' => $post->slug]) }}">Comments</a> -->
                    
                    <div id="disqus_thread"></div>


                   <ul class="comment-list">
                        <!-- <li class="comment">
                            <div class="vcard">
                                <img src="{{ asset('website/images/user.png') }}" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Jean Doe</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                    necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                    iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply rounded">Reply</a></p>
                            </div>
                        </li> -->

                        <!-- <li class="comment">
                            <div class="vcard">
                                <img src="{{ asset('website/images/user.png') }}" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Jean Doe</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                    necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                    iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply rounded">Reply</a></p>
                            </div>

                            <ul class="children">
                                <li class="comment">
                                    <div class="vcard">
                                        <img src="{{ asset('website/images/user.png') }}" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>Jean Doe</h3>
                                        <div class="meta">January 9, 2018 at 2:21pm</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                            laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe
                                            enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?
                                        </p>
                                        <p><a href="#" class="reply rounded">Reply</a></p>
                                    </div>


                                    <ul class="children">
                                        <li class="comment">
                                            <div class="vcard">
                                                <img src="{{ asset('website/images/user.png') }}"
                                                    alt="Image placeholder">
                                            </div>
                                            <div class="comment-body">
                                                <h3>Jean Doe</h3>
                                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
                                                    quidem laborum necessitatibus, ipsam impedit vitae autem, eum
                                                    officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                                                    impedit necessitatibus, nihil?</p>
                                                <p><a href="#" class="reply rounded">Reply</a></p>
                                            </div>

                                            <ul class="children">
                                                <li class="comment">
                                                    <div class="vcard">
                                                        <img src="{{ asset('website/images/user.png') }}"
                                                            alt="Image placeholder">
                                                    </div>
                                                    <div class="comment-body">
                                                        <h3>Jean Doe</h3>
                                                        <div class="meta">January 9, 2018 at 2:21pm</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Pariatur quidem laborum necessitatibus, ipsam impedit vitae
                                                            autem, eum officia, fugiat saepe enim sapiente iste iure!
                                                            Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                        <p><a href="#" class="reply rounded">Reply</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                       
                        @foreach($post->blogcomments as $comment)
                         @if(!$comment->name == '') 
                        <li class="comment">
                            <div class="vcard">
                                <img src="{{ asset('website/images/user.png') }}" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                              <h3>{{ $comment->name }}</h3>
                                <div class="meta">{{ $comment->created_at }}</div>
                                   <div class="rated">
                                       @for($i=1; $i<=$comment->star_rating; $i++)                                                      
                                         <label class="star-rating-complete" title="text">{{$i}} stars</label>
                                       @endfor
                                        <i class="fa fa-star fa-2x"></i>
                                   </div>
                                   <br /><br />
                                <p>{{ $comment->comments}}</p>
                               <p><a href="#" class="reply rounded">Reply</a></p>
                            </div>
                        </li>

                         @else
                         @endif
                        @endforeach
                    </ul>
                    <!-- END comment-list -->
                       
                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        <form action="{{route('review.store')}}" id="reviewForm" class="p-5 bg-light">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="post_id" value="{{ $post->id }}" name="post_id" >
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="post_title" value="{{ $post->title }}" name="post_title" >
                            </div>
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name" name="name" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" >
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone *</label>
                                <input type="number" class="form-control" id="phone" name="phone" >
                            </div>
                                <label for="rating" class="rating_sy">Rating *</label>
                            <div class="form-group">
                                <div class="rate">
                                    <input type="radio" id="star5" class="rate" id="rating" name="rating" value="5"/>
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" checked id="star4" class="rate" id="rating" name="rating" value="4"/>
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" class="rate" id="rating" name="rating" value="3"/>
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" class="rate" id="rating" name="rating" value="2">
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" class="rate" id="rating" name="rating" value="1"/>
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div><br /><br />
                            <div class="form-group">
                                <label for="message">Comment *</label>
                                <textarea name="comments" id="comments" cols="30" rows="10" class="form-control" ></textarea>
                            </div>

                            
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary commentbtn" id="submit">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
           <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box search-form-wrap">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <div class="bio text-center">
                       <!--  <img src="@if($post->user->image) {{ $post->user->image }} @else {{ asset('website/images/user.png') }} @endif" alt="{{ $post->user->image }}" class="img-fluid mb-5"> -->

                        @if($post->user->image)
                        <img src="{{ url($post->user->image) }}" alt="" class="img-fluid mb-5">
                        @else 
                         <img src="{{ asset('website/images/user.png') }}" alt="" class="img-fluid mb-5">
                        @endif

                        <div class="bio-body">
                            <h2>{{ $post->user->name }}</h2>
                            <p class="mb-4">{{ $post->user->description }}</p>
                            <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                            <p class="social">
                                <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            @foreach($posts as $post)
                            <li>
                                <a href="">
                                    <img src="{{ url($post->image) }}" alt="Image placeholder"
                                        class="mr-4">
                                    <div class="text">
                                        <h4> {{ $post->title }} </h4>
                                        <div class="post-meta">
                                            <span class="mr-2"> {{ $post->created_at->format('M d, Y')}} </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>

                    <ul class="categories">
                        @foreach($categories as $category)
                        <li><a href="#">{{ $category->name }} <span>()</span> </a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- END sidebar-box -->
                
                <div class="sidebar-box">
                    <h3 class="heading">Tags</h3>
                    <ul class="tags">
                        @foreach($tags as $tag)
                        <li><a href="{{ route('website.tag', ['slug' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- END sidebar -->

        </div>
    </div>
</section>

<div class="site-section bg-light">
    <div class="container">

        <div class="row mb-5">
            <div class="col-12">
                <h2>More Related Posts</h2>
            </div>
        </div>

        <div class="row align-items-stretch retro-layout">

            <div class="col-md-5 order-md-2">
                @foreach($lastRelatedPost as $post)
                <a href="single.html" class="hentry img-1 h-100 gradient"
                    style="background-image: url('{{ url($post->image) }}');">
                    <span class="post-category text-white bg-danger">{{ $post->category->name }}</span>
                    <div class="text">
                        <h2>{{ $post->title }}</h2>
                        <span>{{ $post->created_at->format('M d, Y')}}</span>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="col-md-7">
                @foreach($firstRelatedPost as $post)
                <a href="single.html" class="hentry img-2 v-height mb30 gradient"
                    style="background-image: url('{{ url($post->image) }}');">
                    <span class="post-category text-white bg-success">{{ $post->category->name }}</span>
                    <div class="text text-sm">
                        <h2>{{ $post->title }}</h2>
                        <span>{{ $post->created_at->format('M d, Y')}}</span>
                    </div>
                </a>
                @endforeach

                <div class="two-col d-block d-md-flex justify-content-between">
                    @foreach($firstRelatedPosts2 as $post)
                    <a href="{{ route('website.post', ['slug' => $post->slug]) }}" class="hentry v-height img-2 gradient"
                        style="background-image: url('{{ url($post->image) }}');">
                        <span class="post-category text-white bg-primary">{{ $post->category->name }}</span>
                        <div class="text text-sm">
                            <h2>{{ $post->title }}</h2>
                            <span>{{ $post->created_at->format('M d, Y')}}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

<div class="site-section bg-lightx">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5">
                <div class="subscribe-1 ">
                    <h2>Subscribe to our newsletter</h2>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a
                        explicabo, ipsam nostrum.</p>
                    <form action="#" class="d-flex">
                        <input type="text" class="form-control" placeholder="Enter your email address">
                        <input type="submit" class="btn btn-primary" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    /*(function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://laravel-blog-tutorial-series.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();*/
</script>
<script id="dsq-count-scr" src="//laravel-blog-tutorial-series.disqus.com/count.js" async></script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script src="{{ asset('website') }}/js/review-rating.js"></script>


<script>
/*if ($("#reviewForm").length > 0) {
$("#reviewForm").validate({

rules: {
    name: {
    required: true,
    maxlength: 50
    },
    email: {
    required: true,
    maxlength: 50,
    email: true,
    },  
    phone: {
    required: true,
    maxlength: 50
    },
    comments: {
    required: true,
    maxlength: 300
    },   
},
messages: {
    name: {
    required: "Please enter name",
    maxlength: "Your name maxlength should be 50 characters long."
    },
    email: {
    required: "Please enter valid email",
    email: "Please enter valid email",
    maxlength: "The email name should less than or equal to 50 characters",
    },
    phone: {
    required: "Please enter  phone",
    email: "Please enter valid phone",
    maxlength: "The phone should less than or equal to 50 characters",
    },   
    comments: {
    required: "Please enter comment",
    maxlength: "Your comment maxlength should be 300 characters long."
    },
},

submitHandler: function(form) {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#submit').html('Please Wait...');
    $("#submit"). attr("disabled", true);
    $.ajax({
        url: "{{url('store-data')}}",
        type: "POST",
        data: $('#reviewForm').serialize(),

        success: function( response ) {
            $('#submit').html('Submit');
            $("#submit"). attr("disabled", false);
             alert('Ajax form has been submitted successfully');
            document.getElementById("reviewForm").reset(); 
        }
    });
}
})
}*/
</script>

@endsection          