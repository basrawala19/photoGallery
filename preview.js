
$(document).ready(function( ){
  //alert("fgfg") ;
  function neueFade() {

    if ( typeof neueFade.counter == 'undefined' ) {
        // It has not... perform the initialization
        neueFade.counter = 1000;
    }
    else if ( neueFade.counter < 10000 ) {
        neueFade.counter += 2550 ;
    }
    //alert(++neueFade.counter);

    $(this).hide().fadeIn(neueFade.counter);
   };

   function neueFade1() {

     if ( typeof neueFade.counter == 'undefined' ) {
         // It has not... perform the initialization
         neueFade.counter = 1000;
     }
     else if ( neueFade.counter < 10000 ) {
         neueFade.counter += 9550 ;
     }
     //alert(++neueFade.counter);

     $(this).hide().fadeIn(neueFade.counter);
    };

  $('div.cp').jscroll({
      ///autoTrigger : false,
      //autoTriggeruntil : '600',
      nextSelector : 'a.nav:last',
      contentSelector : '.cp',
      loadingHtml : "<strong>Loading.....</strong>",
      //padding : 20,
      callback:neueFade1
  });
  $('tbody.cp_').jscroll({
      ///autoTrigger : false,
      //autoTriggeruntil : 59,
      nextSelector : 'a.nav:last',
      contentSelector : 'tbody.cp_',
      loadingHtml : "<strong>Loading.....</strong>",
      //padding : 20,
      callback: neueFade
  });
  $(document).on('click', 'img.p', function(e) {
        //alert("hatim");
        e.preventDefault(); // avoids calling success.php from the link
        var id = this.id;
        var gallery_name = document.getElementById('gallery_name').value ;
        //alert(gallery_name);
        //alert(id);
        //$.fancybox.showActivity();
        $.ajax({
            type: "POST",
            cache: false,
            url: 'http://localhost/photoGallery/index.php/preview/index/?id='+id+'&gallery_name='+gallery_name, // success.php
            success: function (data) {
            // on success, post returned data in fancybox
            $.fancybox(data, {
                // fancybox API options
                width: 900,
                height: 700,
                autoSize: false,
                fitToView: false,
                openEffect: 'elastic',
                closeEffect: 'elastic'
            }); // fancybox
            } // success
        }); // ajax
    }); // on


    $(document).on('click', 'img.photos', function(e) {
            //alert("hatim");
            e.preventDefault(); // avoids calling success.php from the link
            var id = this.id;
            //alert(id);
            //$.fancybox.showActivity();
            $.ajax({
                type: "POST",
                cache: false,
                url: 'http://localhost/photoGallery/index.php/preview/index/?id='+id+'&f=1', // success.php
                success: function (data) {
                // on success, post returned data in fancybox
                $.fancybox(data, {
                    // fancybox API options
                    width: 900,
                    height: 700,
                    autoSize: false,
                    fitToView: false,
                    openEffect: 'elastic',
                    closeEffect: 'elastic'
                }); // fancybox
                } // success
            }); // ajax
        }); //



        $(document).on('click', 'span.gal', function(e) {
              alert("hatim");
              e.preventDefault(); // avoids calling success.php from the link
              //alert("hgh");
              var gallery_name = this.innerHTML;
              //alert(gallery_name) ;
              //$('#target').html('gfdg');
                $.ajax({
                  type: "POST",
                  cache: false,
                  url: 'http://localhost/photoGallery/index.php/gallery_images/index/?gallery_name='+gallery_name, // success.php
                  success: function (data) {
                    //alert(jQuery(data).find('#ajax-data'));
                    jQuery('#target').html(data) ;
                    $('.fancybox').fancybox({
                      width: 100,
                      height: 500,
                      openEffect: 'elastic',
                      closeEffect: 'elastic'
                    }) ;
                  /*$.fancybox(data, {
                      // fancybox API options
                      width: 900,
                      height: 700,
                      autoSize: false,
                      fitToView: false,
                      openEffect: 'elastic',
                      closeEffect: 'elastic'
                  }); // fancybox*/
                  } // success
              }); // ajax
          }); // on



});
