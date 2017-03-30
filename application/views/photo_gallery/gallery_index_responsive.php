<head>

  <style>

    td,th{

      text-align:center;

    }
    .table tbody>tr>td {
      vertical-align: middle;
    }
    .table tbody>tr>th {
      vertical-align: middle;
    }

    a{
      color:#333;
      font-weight: bold;
    }

    a:hover{
      font-weight: bolder;
      color:black;
    }


  </style>

</head>

  <body id="page-top" class="index">


    <!--script src="<?php echo $project_url ; ?>landingPage/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $project_url ; ?>landingPage/js/agency.min.js"></script-->


      <!-- Navigation -->
      <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top" style="padding-top:10px;">
          <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header page-scroll">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs">
                      <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                  </button>
                  <a class="navbar-brand page-scroll" href="#page-top">Image Plogger</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs" >
                  <ul class="nav navbar-nav navbar-right">
                      <li class="hidden">
                          <a href="#page-top"></a>
                      </li>
                      <li>
                            <a class="page-scroll" href="#portfolio">Galleries</a>
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

<!--section id="portfolio">
      <table class="table table-hover table-bordered table-center">

        <thead>
          <tr>
            <th>#</th>
            <th>Photographer</th>
            <th>Total Images</th>
            <th>Gallery</th>
          </tr>
        </thead>

        <tbody>
          <?php $galleries = gallery::get_all_galleries( ) ;
          $i = 0 ;
          foreach ($galleries as $gallery ) : ?>
          <tr>
          <th scope="row"><?php echo ++$i ; ?></th>
          <td>

            <img class="img-responsive portfolio-img center-block"  src="<?php echo $project_url ; ?><?php echo $gallery->image_path()?>">

            <div class="portfolio-caption">
                <h4><?php echo $gallery->name; ?></h4>
                <p class="text-muted">Graphic Design</p>
            </div>

          </td>
          <td><a href="#" onclick="return false"><?php echo gallery::count_images($gallery->name) ; ?></a></td>
          <td><a class="portfolio-link"  href="<?php echo $url."index_page_responsive/index/?gallery_name=".$gallery->name ?>" >Open Gallery</a></td>
        </tr>
          <?php endforeach ; ?>
        </tbody>
      </table>
</section-->
      <!-- Portfolio Grid Section -->
      <section id="portfolio" class="bg-light-gray" style="padding-top:60px;">
          <div class="container gallery">
              <div class="row">
                  <div class="col-lg-12 text-center">
                      <h2 class="section-heading">Amazing Galleries</h2>
                      <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                  </div>
              </div>
              <!--
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
                -->
                </div>

                <div class="text-center add-gallery">
                  <p><a href="#"><h4>Load More Galleries</h4></a></p>
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




  </body>
  </html>
