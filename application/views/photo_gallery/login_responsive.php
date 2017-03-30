
<!--html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Images Plogger</title>
  <link rel="stylesheet" href="../../../CSS/style.css"  />
  <script src="http://localhost/photoGallery/landingPage/vendor/jquery/jquery.min.js"></script>
  <script src="http://localhost/photoGallery/landingPage/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="http://localhost/photoGallery/landingPage/js/agency.min.js"></script>

  <!-- Add jQuery library >
  <script type="text/javascript" src="../../../jquery.js"></script>

  <!-- Add mousewheel plugin (this is optional) >
  <script type="text/javascript" src="../../../fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

  <!-- Add fancyBox >
  <link rel="stylesheet" href="../../../fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
  <script type="text/javascript" src="../../../fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

  <!-- Optionally add helpers - button, thumbnail and/or media >
  <link rel="stylesheet" href="../../../fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
  <script type="text/javascript" src="../../../fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
  <script type="text/javascript" src="../../../fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

  <link rel="stylesheet" href="../../../fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
  <script type="text/javascript" src="../../../fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
  <script type="text/javascript" src="../../../preview.js"></script>
  <script type="text/javascript" src="../../../login.js"></script>
  <script src="../../../js/jquery.jscroll.min.js"></script>
  <script src="../../../js/jquery.jscroll.js" ></script>


  <!-- Bootstrap Core CSS >
  <link href="http://localhost/photoGallery/landingPage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts >
  <link href="http://localhost/photoGallery/landingPage/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Theme CSS >
  <link href="http://localhost/photoGallery/landingPage/css/agency.css" rel="stylesheet">
  <link href="http://localhost/photoGallery/landingPage/vendor/bootstrap/css/bootstrap-social.css" rel="stylesheet">

</head-->
<body id="page-top" class="index" style="padding-bottom:0px">

<!--script src="<?php echo $project_url ; ?>landingPage/vendor/bootstrap/js/bootstrap.min.js"></script-->

<div class="login">
  <div id="l_inline" align="center" style="display:none" >
      <h2>Login</h2>
      <div id="lpr"></div>
      <form  method="post" id="l_form">
          <table class="pop_up" cellspacing="15" cellpadding="5">
              <tr><td>Username : </td><td><input type="text" id="l_username" /></td></tr>
              <tr><td>Password : </td><td><input type="password" id="l_password" /></td></tr>

          </table>
          <br />
            <button class="l_button btn btn-danger" align="center" style="border-radius:4em; ">Submit</button>
      </form>

  </div>


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
                        <a class="page-scroll" href="<?php echo $url ; ?>">Home</a>
                    </li>
                    <li class="status1">
                        <a  href="#" class="page-scroll">Admin Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"> Login </div>

                <a href="<?php echo $url ; ?>hauth/login/Facebook" class="page-scroll btn btn-lg btn-social btn-facebook"><span class="fa fa-facebook"></span> Sign in with Facebook</a>
                <a href="<?php echo $url ; ?>hauth/login/Google" class="page-scroll btn btn-lg btn-social btn-google"><i class="fa fa-google"></i> Sign in with Google</a>

            </div>
        </div>
    </header>


  <footer>
      <div class="container">
          <div class="row">
              <div class="col-md-4">
                  <span class="copyright">Copyright &copy; Image Plogger 2016</span>
              </div>
              <div class="col-md-4">
                  <ul class="list-inline social-buttons">
                      <li><a href="https://basrawala19.github.io/photoGallery/" class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a>
                      </li>
                      <li><a href="#" class="btn btn-sl btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                      </li>
                      <li><a href="#" class="btn btn-sl btn-social-icon btn-google"><i class="fa fa-google"></i></a>
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

</div>
  </body>
</html>
