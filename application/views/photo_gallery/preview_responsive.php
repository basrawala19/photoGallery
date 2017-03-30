<body style="max-width:700px; padding-right:0px;">
<div id="page-top" class="index bg-light-gray text-center" style="max-width:700px;">
  <script src="<?php echo $project_url ; ?>landingPage/vendor/bootstrap/js/bootstrap.min.js"></script>


    <header>
      <div  style="padding-top:0px;" style="max-width:700px;">
        <div class="container" style="max-width:700px;">
            <div class="row">

                <!--div class="intro-lead-in">Welcome To Our Studio!</div>
                <div class="intro-heading">It's Nice To Meet You</div>
                <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a-->
                <!--h2 class="gallery-name"><?php echo "Photo By : ".$gallery_name ; ?></h2-->

                <div class="col-md-12 col-sm-12" style="max-width:700px;">
                  <img class="img-responsive center-block photo-preview-responsive"  src="<?php echo $project_url.$photo->image_path();?>">
              </div>
              <div class="col-md-12 col-sm-12">
                <h4 class="section-heading"><?php echo "Photo By : ".$gallery_name ; ?></h4>
                <!--h3 class="section-subheading text-muted">A beautiful photograph taken on may 2013.</h3-->
              </div>
            </div>
              </div>
        </div>
    </header>


        <!--section id="comment">
        <div class="container text-center center-block" style="max-width:700px;">

          <?php
          $comments = comment::find_by_photoid($id) ;
          foreach ($comments as $cmt ) {?>

          <?php //echo $cmt->author ;

            $ext_user = thirdpartyuser::find_by_id ( $cmt->user_id ) ;

            if ( $ext_user )
              {
                echo "<a href='".$ext_user->profileURL."'>".$ext_user->firstName."</a>" ;
              }
          ?> wrote on <?php echo date("d/m/Y", strtotime($cmt->time));?>
          <br /><br /><?php echo $cmt->body ; ?>
          <br /><br /><br /><?php
          }

          ?>
          <div id="pr"></div>
        <form  method="post" id="comm_form">
            <div class="container" style="max-width:700px;">
                <textarea id="body" name="body" rows="3"  style="border-radius:5%; color:black;"></textarea>
            </div>
            <br />
            <input type="hidden" id="photo_id" value="<?php echo $id ; ?>" />
            <input type="hidden" id="user_id" value="<?php echo $user_id ; ?>" />
            <button  value="Post_Comment" class="btn btn-primary comm_button">Post_Comment</button>
        </form>
      </div>
    </section-->

    <!--footer>
        <div class="container" style="max-width:700px;">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer-->
    <script src="<?php echo $project_url ; ?>/landingPage/css/agency.css"></script>
</div>
</body>
</html>
