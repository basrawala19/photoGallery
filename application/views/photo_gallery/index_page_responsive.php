<style>



  a{
    color:#333;
    font-weight: bold;
  }

  a:hover{
    font-weight: bolder;
    #color:black;
  }


</style>

<body id="page-top" class="index">

  <!--script src="<?php echo $project_url ; ?>landingPage/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo $project_url ; ?>landingPage/js/agency.min.js"></script-->
      <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top" style="padding-top:10px;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bs">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Image Plogger</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse bs">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <?php echo "<a class='page-scroll' href='" .$url."gallery_index_responsive/index/'>Photographers</a>"   ?>

                    </li>
                    <li>
                          <a class="page-scroll" href="#portfolio">Gallery</a>
                    </li>
                    <li>
                        <a class="page-scroll" href=<?php echo "'".$user_profile->profileURL."'>".$user_profile->firstName; ?> </a>
                    </li>
                    <li>
                        <?php echo "<a class='page-scroll' href='" .$url."hauth/logout/".$provider."'>Logout</a>"   ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header class="indexPage">

        <!--div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Our Studio!</div>
                <div class="intro-heading">It's Nice To Meet You</div>
                <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>
            </div>
        </div-->
    </header>
    <input type="hidden" id="gallery_name" value="<?php echo $gallery_name ?>" />

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray" style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo $gallery_name ;?></h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>

            <?php foreach ($photos as $photo ) : ?>

                  <div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link"  href="<?php echo $url;?>photo_responsive/index/?id=<?php echo $photo->id ; ?>&gallery_name=<?php echo $gallery_name; ?>" ><span style="padding-left:0em;"  class="photos" id=<?php echo $photo->id; ?>><img class="p img-responsive portfolio-img" id=<?php echo $photo->id; ?> src="<?php echo $project_url ; ?><?php echo $photo->image_path()?>"></span></a>

                    <div class="portfolio-caption">
                        <table class="table" style="margin-bottom:0px;"><tr><td><h4>Round Icons</h4></td>
                          <td>
                            <p style="text-align:right;"><a class="portfolio-link"  href="<?php echo $url;?>photo_responsive/index/?id=<?php echo $photo->id ; ?>&gallery_name=<?php echo $gallery_name; ?>" >Full Image</a></p>
                          </td></tr>
                        </table>
                        <!--p class="text-muted">Graphic Design</p-->

                    </div>

                </div>
            <?php endforeach ; ?>




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


    <!--script src="<?php echo $project_url ; ?>landingPage/js/agency.min.js"></script-->


</body>
</html>
