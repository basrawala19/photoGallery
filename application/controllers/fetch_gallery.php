<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fetch_gallery extends CI_Controller{


  public function index( ) {


      $this->load->helper('url') ;
      $provider = provider_not_connected( ) ;
      $user_id = Hybrid_Auth::getUserId( $provider ) ;
      $this->load->model('gallery');
      $url = base_url( );
      $project_url = project_url( ) ;
      $page_number = $_GET['page'] ;

      $galleries = gallery::get_galleries($page_number) ;
      foreach ($galleries as $gallery ) : ?>

            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link"  href="<?php echo $url."index_page_responsive/index/?gallery_name=".$gallery->name ?>" ><img class="img-responsive portfolio-img"  src="<?php echo $project_url ; ?><?php echo $gallery->image_path()?>"></a>

              <div class="portfolio-caption">
                  <h4><?php echo $gallery->name; ?></h4>
                  <p class="text-muted">Graphic Design</p>
              </div>

          </div>
      <?php endforeach ;

      /*$this->load->view('photo_gallery/preview_header');

      $data = array( ) ;
      $data['user_id'] = $user_id ;
      $data['url'] = $url ;
      $data['id'] = $id ;
      $data['gallery_name'] = $gallery_name ;
      $data['photo'] = $photo ;
      $data['provider'] = $provider ;
      $data['project_url'] = $project_url ;
      $this->load->view ('photo_gallery/Preview_responsive',$data) ;*/


    }}?>
