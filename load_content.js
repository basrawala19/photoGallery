$(document).ready(function( ){


var track_page = 1; //track user click as page number, right now page number is 1
load_contents(track_page); //load content

$("div.add-gallery").click(function (e) { //user clicks on button
    //alert("gg") ;
    track_page++; //page number increment everytime user clicks load button
    load_contents(track_page); //load content
});

//Ajax load function
function load_contents(track_page){
    //$('.animation_image').show(); //show loading image
    //alert("ggp");

    $.ajax({
        type: "POST",
        cache: false,
        url: 'http://localhost/photoGallery/index.php/fetch_gallery/index/?page='+track_page, // success.php
        success: function (data) {
        //alert(data) ;
        if(data.trim().length == 0){
            //display text and disable load button if nothing to load
            $(".add-gallery").html("<h4>No more records!</h4>").prop("disabled", true);
        }

        $("div.gallery").append(data); //append data into #results element

        //scroll page to button element
        if ( track_page != 1 )
          $("html, body").animate({scrollTop: $(".add-gallery").offset().top}, 800);

        //hide loading image
        //$('.animation_image').hide(); //hide loading image once data is received
    }
  });
}
});
