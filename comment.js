$(document).ready(function(){

  $('button').on('click',function(e){
      //alert("dsg");
      $("#comm_form").submit(function() { return false; });
        //var author = $('#author').val();
        var user_id = $('#user_id').val( );
        var body = $('#body').val();
        var photo_id = $('#photo_id').val();
        var urll = 'http://localhost/CodeIgniter_2.2.0/index.php/admin/post_comment/index/?user_id='+user_id+'&body='+body+'&photo_id='+photo_id;
      document.getElementById('pr').innerHTML = "";
      flag = 1 ;
      //alert(photo_id);
      if ( body.length == 0 ){
        alert("Caption Can't Be Empty");
        flag = 0 ;
        document.getElementById('pr').innerHTML += "<p>Caption Can't Be Empty </p> ";
      }
      if ( body.length > 50 ){
        alert("Captia too long");
        flag = 0 ;
        document.getElementById('pr').innerHTML += "<p>Captia too long</p> ";
      }
      //alert(urll);

      if ( flag ){
        $.ajax({
          type: 'POST',
          url: urll,
          success: function(data) {
            var $response = $(data);
            var vall = $response.filter("#pp").text();
            //alert(vall);
            if(vall=="true") {
              $('#comm_form').fadeOut("slow", function(){
                $(this).before("<strong>Success! Your comment has been posted, thanks :)</strong>");
              });
            }
            else{
              document.getElementById('pr').innerHTML = "<strong>Error Occured While Posting Comment </strong>";
              return ;
            }

          }
        });
      }
  });

});
