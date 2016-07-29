<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_index extends CI_Controller{

    public function index (  ) {
    //  $this->load->view();
       $this->load->view('photo_gallery/admin_headers');
       $this->load->model('gallery');
       $this->session->userdata('is_login') == NULL ? $this->functions->redirect_to (base_url()."admin/login/") : NULL ;
       $url = base_url( ) ;
       $message = $this->session->userdata('message') ? $this->session->userdata('message') : "" ;
       $this->session->set_userdata('message',"");
       ?>
       <?php


        ?>
        <div id="main">
            <div id="status">
              Welcome <?php echo $this->session->userdata('username');?>&nbsp;&nbsp;&nbsp;
              <a href="<?php echo $url."admin/logout/"; ?>">Log Out</a>
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
                        <td align="center"><a href="<?php echo $url."admin/list_photos/index?gallery_name=".$gallery->name ?>">Click Here </a></td>
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
