<?php
if ( isset($_POST['submit']) ) {

        $comment = new comment( ) ;
        $_POST['photo_id'] = $_GET['id'] ;
        $_POST['user_id'] = $user_profile->id ;
        //echo "id is:" .$user_profile->id ;
        if ( !$comment->insert($_POST) ) {
                $message = "Error Saving the Comment (Empty Body Field)";
                echo "dffd" ;
        }else{

          //echo "gdfgdF".$_POST['author'] ;
        }
}
?>
        <body id="page-top" class="index photo">
            <!-- Navigation -->
            <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>

                            <li>
                              <a class="page-scroll" href="<?php echo $url."index_page/index/?gallery_name=".$gallery; ?>" >&laquo; Gallery</a>

                            </li>
                            <li>
                                <a class="page-scroll" href=<?php echo "'".$user_profile->profileURL."'>".$user_profile->firstName; ?> </a>
                            </li>
                            <li>
                                <?php echo "<a class='page-scroll' href='" .$url."hauth/logout/".$provider."'>Logout</a>"   ?>
                            </li>
                            <li>
                                <a class="page-scroll" href="#comment">comment</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

            <!-- Header -->
            <header>
              <div class="intro-text-photo">
                <div class="container">
                    <div class="row">

                        <!--div class="intro-lead-in">Welcome To Our Studio!</div>
                        <div class="intro-heading">It's Nice To Meet You</div>
                        <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a-->
                        <!--h2 class="gallery-name"><?php echo "Photo By : ".$gallery ; ?></h2-->

                        <div class="col-md-8 col-sm-8">
                          <img class="img-responsive center-block photo-responsive" src="<?php echo "http://localhost/photoGallery/".$photo->image_path();?>">
                      </div>
                      <div class="col-md-4 col-sm-4 caption">
                        <h2 class="gallery-name"><?php echo "Photo By : ".$gallery ; ?></h2>
                        A beautiful photograph taken at rain forest on may 2013.
                      </div>
                    </div>
                      </div>
                </div>
            </header>


                <section id="comment">
                <div class="container text-center center-block">

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

                <form action="#" method="post">
                    <div class="container">
                        <textarea name="body" rows="3"  style="border-radius:5%; color:black;"></textarea>
                    </div>
                    <br />
                    <button type="submit" name="submit" value="Post_Comment" class="btn btn-primary">Post_Comment</button>
                </form>
              </div>
            </section>

            <footer>
                <div class="container">
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
            </footer>



                        <!-- jQuery -->
                        <script src="http://localhost/photoGallery/landingPage/vendor/jquery/jquery.min.js"></script>

                        <!-- Bootstrap Core JavaScript -->
                        <script src="http://localhost/photoGallery/landingPage/vendor/bootstrap/js/bootstrap.min.js"></script>

                        <!-- Plugin JavaScript -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

                        <!-- Contact Form JavaScript -->
                        <script src="http://localhost/photoGallery/landingPage/js/jqBootstrapValidation.js"></script>
                        <script src="http://localhost/photoGallery/landingPage/js/contact_me.js"></script>

                        <!-- Theme JavaScript -->
                        <script src="http://localhost/photoGallery/landingPage/js/agency.min.js"></script>

        </body>

        </html>
