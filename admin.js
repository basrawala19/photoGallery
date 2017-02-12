$(document).ready(function(){

  $('span').on("click", function (e) {
      alert("sdf");
      if ( this.className != 'c_user' && this.className != 'e_user' ){
          return ;
      }

      e.preventDefault();
      var url ;
      id = this.id ;
      if ( this.className == 'c_user' || this.className == 'e_user' ){

          if ( this.className == 'c_user' ) {
            url = "#c_inline";
          }
          else{
              url = "#e_inline" ;
          }
          $.fancybox({
              // fancybox API options
              'href':url,
              width: 500,
              height: 250,
              autoSize: false,
              fitToView: true,
              openEffect: 'elastic',
              closeEffect: 'elastic'
          }); // fancybox
    }
  }); // on



  $('button.e_button, button.c_button').on('click',function(e){
      if ( this.className == "c_button" ){
        $("#c_form").submit(function() { return false; });
        var unlen = $('#c_username').val();
        var pwd = $('#c_password').val();
        var fn = $('#c_first_name').val();
        var ln = $('#c_last_name').val();
        var pr = 'c_pr' ;
        var form = '#c_form';
        var msg = "<strong>Success! User Created :)</strong>" ;
        var urll = 'http://localhost/photoGallery/index.php/admin/create_user/index/?username='+unlen+'&password='+pwd+'&first_name='+fn+'&last_name='+ln

      }
      else if (  this.className == "e_button" ){
        $("#e_form").submit(function() { return false; });
        var unlen = $('#e_username').val();
        var pwd = $('#e_password').val();
        var fn = $('#e_first_name').val();
        var ln = $('#e_last_name').val();
        var pr = 'e_pr' ;
        var form = '#e_form';
        var msg = "<strong>Success! User Records Updated :)</strong>" ;
        var urll = 'http://localhost/photoGallery/index.php/admin/edit_user/index/?username='+unlen+'&password='+pwd+'&first_name='+fn+'&last_name='+ln+'&id='+id;
      }

      document.getElementById(pr).innerHTML = "";
      flag = 1 ;

      if ( unlen.length == 0 ){
        //alert("username  can't be empty");
        flag = 0 ;
        document.getElementById(pr).innerHTML += "<p>username can't be empty</p> ";
      }
      if ( unlen.length > 10 ){
          //alert("username too long");
          flag = 0 ;
          document.getElementById(pr).innerHTML += "<p>username too long</p> ";
      }
      if ( pwd.length > 10 ){
        //alert("password too long");
        flag = 0 ;
        document.getElementById(pr).innerHTML += "<p>password too long</p> ";
      }
      if ( pwd.length == 0 ){
        //alert("password  can't be empty");
        flag = 0 ;
        document.getElementById(pr).innerHTML += "<p>password can't be empty</p> ";
      }

      if ( flag ){
        $.ajax({
          type: 'POST',
          url: urll,
          success: function(data) {
            var $response = $(data);
            var vall = $response.filter("#pp").text();
            if(vall=="true") {
              $(form).fadeOut("fast", function(){
                $(this).before(msg);
                setTimeout("$.fancybox.close()", 1000);
                setTimeout( function(){
                  window.location = "http://localhost/photoGallery/index.php/admin/manage_admins/";
                },1000);
              });
            }
            else{
              document.getElementById(pr).innerHTML = "<strong>Error creating user </strong>";
              return ;
            }

          }
        });
      }
  });

});
