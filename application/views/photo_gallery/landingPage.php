

<body id="page-top" class="index">
    <script src="<?php echo $project_url ; ?>landingPage/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--script src="<?php echo $project_url ; ?>landingPage/js/agency.min.js"></script-->
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Image Plogger</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <!--li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li-->
                    <li>
                        <a class="page-scroll" href="#portfolio">Galleries</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#download">Download</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>

                      <?php if ( !isset( $user_profile) ) { ?>
                        <a class="page-scroll" href="<?php echo $url ; ?>hauth/index/">Sign In</a>
                      <?php }else{
                        echo "<a href='" .$user_profile->profileURL."'>". $user_profile->firstName ."</a>" ;
                      } ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header class="landingPage">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Our Studio!</div>
                <div class="intro-heading">It's Nice To Have You</div>
                <a href="<?php echo $url ; ?>gallery_index_responsive/index/" class="page-scroll btn btn-xl">Explore Galleries</a>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->

    <section id="portfolio" class="bg-light-gray">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <h2 class="section-heading">Amazing Galleries</h2>
                  <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
              </div>
          </div>

          <?php $galleries = gallery::get_all_galleries( ) ;
          foreach ($galleries as $gallery ) : ?>

                <div class="col-md-4 col-sm-6 portfolio-item">
                  <a class="portfolio-link"  href="<?php echo $url."index_page_responsive/index/?gallery_name=".$gallery->name ?>" ><img class="img-responsive portfolio-img"  src="<?php echo $project_url ; ?><?php echo $gallery->image_path()?>"></a>

                  <div class="portfolio-caption">
                      <h4><?php echo $gallery->name; ?></h4>
                      <p class="text-muted">Graphic Design</p>
                  </div>

              </div>
          <?php endforeach ; ?>




            </div>

        <!--div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Trending Galleries</h2>
                    <h3 class="section-subheading text-muted">Featuring Popular Images</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <!div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="<?php echo $project_url ; ?>landingPage/img/portfolio/roundicons.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Round Icons</h4>
                        <p class="text-muted">Graphic Design</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">

                        <img src="<?php echo $project_url ; ?>landingPage/img/portfolio/startup-framework.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Startup Framework</h4>
                        <p class="text-muted">Website Design</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">

                        <img src="<?php echo $project_url ; ?>landingPage/img/portfolio/treehouse.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Treehouse</h4>
                        <p class="text-muted">Website Design</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">

                        <img src="<?php echo $project_url ; ?>landingPage/img/portfolio/golden.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Golden</h4>
                        <p class="text-muted">Website Design</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">

                        <img src="<?php echo $project_url ; ?>landingPage/img/portfolio/escape.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Escape</h4>
                        <p class="text-muted">Website Design</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">

                        <img src="<?php echo $project_url ; ?>landingPage/img/portfolio/dreams.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Dreams</h4>
                        <p class="text-muted">Website Design</p>
                    </div>
                </div>
            </div>
        </div-->
    </section>


    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">An Amazing Journey To Image Plogger...</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="<?php echo $project_url ; ?>landingPage/img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2014-2015</h4>
                                    <h4 class="subheading">Our Humble Beginnings</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Started from a web project based on PHP and MYSQL.Front-End was created using HTML and CSS.The goal of the project was to provide a platform for users to share there beautiful memories with audience. </p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="<?php echo $project_url ; ?>landingPage/img/about/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>March 2015</h4>
                                    <h4 class="subheading">Enhancements And Development</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">The Project was shifted to MVC model for faster and reliable flow.Javascript library JQUERY was employed for dynamic client side web pages. Pop-up windows were used for providing better look to the galleries</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="<?php echo $project_url ; ?>landingPage/img/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2015-2016</h4>
                                    <h4 class="subheading">Third Party Sign-In</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">In order to reach to a large group of people , third party sign-in was added. It facilitates user to login to the project using third party credentials. The third-party sign-in rights were issued from providers like Facebook and Google.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="<?php echo $project_url ; ?>landingPage/img/about/4.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2016-2017</h4>
                                    <h4 class="subheading">Cross Platform And Responsive</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">The Project is made resposive,thus providing access from any platform and any device like (Tablet, Laptop, Mobile, etc).Also the UX is made more user freindly and attractive with the use of plugins.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Download Image Plogger</h2>
                    <p>You can download Source Code of Image Plogger for free at Github.</p>
                    <a href=" https://basrawala19.github.io/photoGallery/" class="btn btn-default btn-lg">Visit Download Page</a>
                </div>
            </div>
        </div>
    </section>

    <!--div style="padding-top:150px;">
    </div-->

    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h1 class="intro-lead-in">Contact Image Plogger</h1>
                <p>Feel free to email us to provide some feedback on our galleries, give us suggestions for new photos and themes, or to just say hello!</p>

                <p><a href="mailto:feedback@startbootstrap.com">ImagePlogger@gmail.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="#" class="btn btn-default btn-lg facebook"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/basrawala19/photoGallery" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="#" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Image Plogger 2016</span>
                </div>
                <div class="col-md-4">

                    <ul class="list-inline social-buttons">
                        <li><a href="https://basrawala19.github.io/photoGallery/"><i class="fa fa-github"></i></a>
                        </li>
                        <li><a href="#" ><i class="fa fa-facebook"></i></a>
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


    <script src="<?php echo $project_url ; ?>landingPage/js/agency.min.js"></script>


</body>

</html>
