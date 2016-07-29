<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post_comment extends CI_Controller{

    public function index (  ) {?>

      <html><body>

      <?php
      $this->load->model('comment') ;
      $comment = new comment( ) ;
      if ( !$comment->insert($_GET) ) {
            //$message = "Error Saving the Comment (Empty Body Field)";
            echo "<div id=\"pp\">false</div>" ;
      }else{

        echo  "<div id=\"pp\">true</div>" ;
      }
    }
  }
?>
</body>
</html>
