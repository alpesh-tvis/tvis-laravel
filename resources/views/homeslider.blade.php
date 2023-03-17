 <div id="owl-demo" class="owl-carousel owl-theme">
              
      <div class="item"><img src="http://localhost/larablog/public/storage/post/1677491916.jpg" alt="" />
      </div>
      <div class="item"><img src="http://localhost/larablog/public/storage/post/1677491237.jpg" alt="" /></div>
      <div class="item"><img src="http://localhost/larablog/public/storage/post/1677491916.jpg" alt="" /></div>
      <div class="item"><img src="http://localhost/larablog/public/storage/post/1677482557.jpg" alt="" /></div>
      <div class="item"><img src="http://localhost/larablog/public/storage/post/1677491237.jpg" alt="" /></div>
      <div class="item"><img src="http://localhost/larablog/public/storage/post/1677482557.jpg" alt="" /></div>
      <div class="item"><img src="http://localhost/larablog/public/storage/post/1677491916.jpg" alt="" /></div>
      
</div>


<style>
#owl-demo .item{
    padding: 30px 0px;
    color: #FFF;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    text-align: center;
    width: 100%;
    height: 600px;

    }
</style>

@section('script')
<script>
$(document).ready(function() {
     $("#owl-demo").owlCarousel({
     
        navigation : true, // Show next and prev buttons

        slideSpeed : 300,
        paginationSpeed : 400,

        items : 1, 
        itemsDesktop : true,
        itemsDesktopSmall : true,
        itemsTablet: true,
        itemsMobile : true,

        autoplay:true,
        autoplayTimeout:5000
      });
    });
</script>
@endsection