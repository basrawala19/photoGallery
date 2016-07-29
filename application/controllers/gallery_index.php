<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_index extends CI_Controller{

    public function index (  ) {
    //  $this->load->view();
       $this->load->view('photo_gallery/headers');
       $this->load->model('gallery');
       ?>
       <?php
       $url = base_url( ) ;

        ?>
        <div id="main">
            <div id="status">
            Welcome &nbsp;&nbsp;&nbsp;
            <a href="<?php echo $url."admin/login/index";?>">Admin Login</a>
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
                        <td align="center"><a href="<?php echo $url."index_page/index/?gallery_name=".$gallery->name ?>">Click Here </a></td>
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
