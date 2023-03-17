if ($("#reviewForm").length > 0) {
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
    rating: {
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
    maxlength: "The phone should less than or equal to 50 characters",
    }, 
    rating: {
    required: "Please enter rating",
    maxlength: "Your rating maxlength should be 50 characters long."
    },  
    comments: {
    required: "Please enter comment",
    maxlength: "Your comment maxlength should be 300 characters long."
    },
},


/*submitHandler: function(form) {
$('#reviewForm').click(function(evt){
    evt.preventDefault();
        var name = $('#name').val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var rating = $(".rating").val();
        var comments = $("#comments").val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
           
        // 
        $.ajax({
            //this part
            url: "/post",
            type:"POST",
            data: { name: name,email: email,phone: phone,rating: rating,comments: comments,_token: CSRF_TOKEN,},
            success:function(response){
               console.log("working");
            },
            error:function(){
                console.log("error");
            }
        });
    });

}*/

/*submitHandler: function(form) {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#submit').html('Please Wait...');
            alert();
    //$("#submit"). attr("disabled", true);
    $.ajax({
        url: "{{url('reviewstore')}}",
        type: "POST",
        data: $('#reviewForm').serialize(),
        success: function( response ) {
        //alert(response);

        $('#submit').html('Submit');
        $("#submit"). attr("disabled", false);
        document.getElementById("reviewForm").reset(); 
        }
    });
}*/

})


}