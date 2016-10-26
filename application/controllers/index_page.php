<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index_page extends CI_Controller{

    public function index (  ) {

       $this->load->helper('url') ;
       $provider = provider_not_connected( ) ;
       $service = is_logged_in ( $provider ) ;
       $user_profile = $service->getUserProfile( ) ;

       $this->load->view('photo_gallery/headers');?>
       <?php
       $url = base_url( ) ;

        ?>
        <div id="main">
            <div id="status">
            Welcome &nbsp;&nbsp;&nbsp;
            <?php echo "<a href='" .$user_profile->profileURL."'>". $user_profile->firstName ."</a>"   ?> &nbsp;&nbsp;&nbsp;

            <?php echo "<a href='" .$url."hauth/logout/".$provider."'>Logout</a>"   ?> &nbsp;&nbsp;&nbsp;
            </div>
            <input type="hidden" id="gallery_name" value="<?php echo $_GET['gallery_name']; ?>" />
            <?php
            $this->load->model('pagination');
            $this->load->model('photograph');
            $pagination = new pagination( ) ;
            $pagination->current_page = !isset($_GET['id']) ? 1 : $_GET['id'] ;
            $pagination->gallery_name = $_GET['gallery_name'] ;
            $photos = photograph::find_curr_page($pagination); ?>
            <div class="cp">
            <div style="float:left; padding-left:2em;">

            <?php foreach ($photos as $photo ) : ?>


                    <a href="http://localhost/photoGallery/index.php/photo/index/?id=<?php echo $photo->id ; ?>&gallery_name=<?php echo $_GET['gallery_name']; ?>" ><span style="padding-left:6em;"  class="photos" id=<?php echo $photo->id; ?>><img class="p" id=<?php echo $photo->id; ?> src="http://localhost/photoGallery/<?php echo $photo->image_path()?>" width='400' height ='300' vspace="10" hspace="2"/></span></a>
            <?php endforeach ; ?>
            </div>
              <div style="clear:both; padding:2em 4em;">
                    <?php
                    //echo "sdfsgs";
                    if ( $pagination->has_next_page( ) ){ echo "hye" ;?>
                            <a  class="nav" href="<?php echo $url."index_page/index/?id=".(($pagination->current_page)+1)."&gallery_name=".$pagination->gallery_name; ?> ">Next&raquo;</a>

                    <?php } ?>

                    <?php /*
                    if ( $pagination->has_prev_page() ) {
                    ?>
                            <a  href="<?php echo $url."index_page/index/?id=".(($pagination->current_page)-1); ?>">&raquo;Prev</a>
                    <?php }

                    $i = 1 ;
                    while( $i <= $pagination->total_page( ) )
                    {?>
                            <span><a  href="<?php echo $url."index_page/index/?id=".$i; ?>"> <?php echo $i ?></a>&nbsp;</span>

                    <?php $i++;}

                    if ( $pagination->has_next_page( ) ){ ?>
                            <a  class="nav" href="<?php echo $url."index_page/index/?id=".(($pagination->current_page)+1); ?> ">Next&raquo;</a>

                    <?php }
                      */
                    ?>

            </div>
          </div>
        </div>
        <?php $this->load->view("photo_gallery/footers.php");
    }
}?>
