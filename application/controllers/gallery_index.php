<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_index extends CI_Controller{

    public function index ( ) {

       $this->load->helper('url') ;
       $provider = provider_not_connected( ) ;
       $service = is_logged_in ( $provider ) ;
       $user_profile = $service->getUserProfile( ) ;
       foreach ($user_profile as $key => $value) {
         # code...
         Hybrid_Logger::info($key." fgd " .$value) ;
       }
       $this->load->view('photo_gallery/headers');
       $this->load->model('gallery');

       ?>

       <?php
       $url = base_url( ) ;

        ?>
        <div id="main">
            <div id="status">
            Welcome &nbsp;&nbsp;&nbsp;
            <?php echo "<a href='" .$user_profile->profileURL."'>". $user_profile->firstName ."</a>"   ?> &nbsp;&nbsp;&nbsp;

            <?php echo "<a href='" .$url."hauth/logout/".$provider."'>Logout</a>"   ?> &nbsp;&nbsp;&nbsp;
            </div>

            <table border="0" cellspacing="4" cellpadding="6" width="1350" style="padding-left:7EM; padding-top:7EM;">
                <tr><th>GALLERY</th><th>TOTAL IMAGES</th><th>TOTAL COMMENTS</th><th>Click To Open Gallery</th></tr>

                <?php

                  $galleries = gallery::get_all_galleries( ) ;

                  foreach ($galleries as $gallery) : ?>
                      <tr>
                        <td align="center"><a href=""><span class="gal"><?php echo $gallery->name; ?> </span></a></td>
                        <td align="center"><?php echo gallery::count_images($gallery->name); ?> </td>
                        <td align="center"><?php echo gallery::count_comments($gallery->name); ?> </td>
                        <td align="center"><a href="<?php echo $url."index_page_responsive/index/?gallery_name=".$gallery->name ?>">Click Here </a></td>
                      </tr>
                <?php  endforeach;
                ?>


            </table>
            <div id="target"></div>

          </div>
            <?php
              $this->load->view("photo_gallery/footers.php");
            }
          }
             ?>
