$(document).ready(function(){

    //alert("fs");
    $('div#status').on("click", function (e) {

        //alert("sdf");
        e.preventDefault();
            $.fancybox({
                // fancybox API options
                'href':"#l_inline",
                width: 450,
                height: 200,
                autoSize: false,
                fitToView: false,
                openEffect: 'elastic',
                closeEffect: 'elastic'
            }); // fancybox
      });

    $('button').on('click',function(e){

          $("#l_form").submit(function() { return false; });

          var unlen = $('#l_username').val();
          var pwd = $('#l_password').val();
          var form = '#l_form';
          var pr ='lpr' ;
          var urll = 'http://localhost/CodeIgniter_2.2.0/index.php/admin/login_model_window/index/?username='+unlen+'&password='+pwd;

        document.getElementById('lpr').innerHTML = "";
        flag = 1 ;

        if ( unlen.length == 0 ){
          //alert("username  can't be empty");
          flag = 0 ;
          document.getElementById(pr).innerHTML += "<p>username can't be empty</p> ";
        }
        if ( unlen.length > 10 ){
          //  alert("username too long");
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
      //  document.getElementById(pr).innerHTML = "" ;

        if ( flag ){
            $.ajax({
              type: 'POST',
              url: urll,
              success: function(data) {
                var $response = $(data);
                var vall = $response.filter("#pp").text();
                if(vall=="true") {
                  $(form).fadeOut("fast", function(){
                    $(this).before("<strong>Success! You are directed towards admin site ....:)</strong>");
                    setTimeout("$.fancybox.close()", 1000);
                    setTimeout( function(){
                      window.location = "http://localhost/CodeIgniter_2.2.0/index.php/admin/admin_index/";
                    },1000);
                  });
                }
                else if ( vall=="false"){
                  document.getElementById(pr).innerHTML = "<strong> Incorrect Username Or Password </strong>";
                  return ;
                }
              }
            });
          }


    });
});
