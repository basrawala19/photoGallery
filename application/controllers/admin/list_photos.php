<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class List_photos extends CI_Controller{


    public function index ( ) {
        $this->load->view('photo_gallery/admin_headers');
        $this->load->library('functions');
        $this->load->model('comment');
        $this->load->model('photograph');
        $this->load->model('pagination');
        $this->session->userdata('is_login') == NULL ? $this->functions->redirect_to (base_url()."admin/login/") : NULL ;
        $url = base_url( )."admin/" ;
        $message = $this->session->userdata('message') ? $this->session->userdata('message') : "" ;
        $this->session->set_userdata('message',"");
?>
        <div id = "main" >
            <div id="status" >
            Welcome <?php echo $this->session->userdata('username');?>&nbsp;&nbsp;&nbsp;
            <a href="<?php echo $url."logout/"; ?>">Log Out</a>
            </div>

            <?php  echo $this->functions->message($message) ;
                $pagination = new pagination( ) ;
                $pagination->current_page = empty($_GET['id']) ? 1 : $_GET['id'] ;
                $pagination->gallery_name = $_GET['gallery_name'] ;
                $photos = photograph::find_curr_page($pagination) ; ?>

                <table border="0" cellspacing="4" cellpadding="6" width="1350" style="padding-left:7EM;">
                <tr><th height="40" width="500">PHOTO</th>
                <th width="360">TYPE</th>
                <th width="330">SIZE</th>
                <th width="300">Comments</th>
                <th width="300"></th></tr>
                </table>

                <table  border="0" cellspacing="4" cellpadding="6" width="1350" style="padding-left:7EM;">
                  <tbody class="cp_">
                <?php
                $comment = new comment ( ) ;
                foreach ($photos as $photo ) {
                $comments = $comment->count_by_photoid($photo->id);
                ?>

                <tr><td align="center" width="300">
                <a href=""><img  class="photos"  id=<?php echo $photo->id ; ?> src="<?php echo "http://localhost/photoGallery/".$photo->image_path(); ?>" width="300" height="200" /></a></td>
                <td align="center" width="400"><?php echo $photo->type ;?></td>
                <td align="center" width="400"><?php $data = $photo->get_size($photo->size); echo $data[0].$data[1] ;?></td>
                <td align="center" width="400"><a href="<?php echo $url."list_comment/index?id=".$photo->id ;?>"> <?php echo $comments ?> </a></td>
                <td align="center" width="400"><a href="<?php echo $url."delete_photo/index?id=".$photo->id ?>">Delete Image</a></td></tr>
                <?php
                        }
                        if ( $pagination->has_next_page( ) ){ //echo"gfdh";?>
                                <tr><td colspan="5"><a  class="nav" href="<?php echo $url."list_photos/index?id=".(($pagination->current_page)+1)."&gallery_name=".$pagination->gallery_name; ?> ">Next&raquo;</a></td></tr>
                <?php }else{} ?>
              </tbody>
                </table>
                <br /><br /><br /><br /><br /><br />
                <div align="center"><a href="<?php echo $url."upload/";?>" >+upload a new photograph</a>	</div>
                <div style="clear:both; padding:2em 8em;">
                <?php
                /*
                if ( $pagination->has_prev_page() ) {
                ?>
                       <a  href="<?php echo $url."list_photos/index?id=".(($pagination->current_page)-1); ?>">&raquo;Prev</a>
                <?php }

                $i = 1 ;
                while( $i <= $pagination->total_page( ) )
                {?>
                        <span><a  href="<?php echo $url."list_photos/index?id=".$i; ?>"> <?php echo $i ?></a>&nbsp;</span>

                <?php $i++;}

                if ( $pagination->has_next_page( ) ){ ?>
                        <a  class="nav" href="<?php echo $url."list_photos/index?id=".(($pagination->current_page)+1); ?> ">Next&raquo;</a>
                <?php }*/
                ?>
                </div>
        </div>

        <?php $this->load->view("photo_gallery/admin_footers.php");
    }
}?>
