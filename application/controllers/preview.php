<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Preview extends CI_Controller{


  public function index( ) {

      $this->load->view('photo_gallery/model_window_header');
      //echo ( $_GET['id'] ) ;
      $this->load->model('photograph');
      $url = base_url( );
      $id = $_GET['id'];
      $gallery_name = isset($_GET['gallery_name'])? $_GET['gallery_name'] : "" ;

      $photo = photograph::find_by_id($id) ;?>

      <body>
      <div style="background-color:	#8B4513;" id="main">

      <div id="comment" align="center"><?php echo ($photo->name); ?></div>
      <br />
      <div align="center"><img class="preview" src="http://localhost/CodeIgniter_2.2.0/<?php echo $photo->image_path()?>" height=400 width=600 /></div>
      <br />
      <?php

       echo $photo->caption ;

       $this->load->model('comment');
       $comments = comment::find_by_photoid($id) ;
       echo "<div id=\"comment\" >" ;
       $i = 0 ;
       foreach ($comments as $cmt ) { ?>
         <br /><br /><br />
         <?php
         if ( $i > 6 ) { break ; }
         $i++; echo $cmt->author ; ?> wrote
         <br /><?php echo $cmt->body ; ?>
         <br /><?php echo $cmt->time_ ;?>
         <?php
         if ( isset($_GET['f']) && $_GET['f'] == 1 )
          { echo "&nbsp;&nbsp;&nbsp;<a href=\"".$url."admin/delete_comment/index?id=".$cmt->id."&photo_id=".$cmt->photo_id."\">Delete</a>";
          }?>
         <?php } ?><br /><br /><br />

       <?php if ( !isset($_GET['f']) ){
            echo "<a href=\"http://localhost/CodeIgniter_2.2.0/index.php/photo/index/?id=".$id."&gallery_name=".$gallery_name."\" >See Full Image </a>";
        } ?>
          <br /><br />
          <div id="pr"></div>

          <form  method="post" id="comm_form">
              <h3>New Comment </h3>
              <table cellspacing="4" cellpadding="0">
              <tr><td>Author:</td><td><input type="text" id="author"   /></td></tr><br />
              <tr><td align="">Body:</td><td><textarea id="body" rows="8" cols="30"></textarea></td></tr>
              </table>
              <input type="hidden" id="id" value="<?php echo $id ; ?>" />
              <button class="comm_button" align="center" style="border-radius:4em; ">Post Comment</button>
          </form>
      </div>

    </div>
       <?php
        $this->load->view('photo_gallery/footers');
     }

}
?>
