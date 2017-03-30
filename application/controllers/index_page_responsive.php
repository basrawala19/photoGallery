
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

  class Index_page_responsive extends CI_Controller{

    public function index (  ) {
      $this->load->helper('url') ;
      $provider = provider_not_connected( ) ;
      $service = is_logged_in ( $provider ) ;
      $user_profile = $service->getUserProfile( ) ;
      $this->load->model('pagination');
      $this->load->model('photograph');
      $pagination = new pagination( ) ;
      $pagination->current_page = !isset($_GET['id']) ? 1 : $_GET['id'] ;
      $pagination->gallery_name = $_GET['gallery_name'] ;
      $gallery_name = $_GET['gallery_name'] ;
      $photos = photograph::find_curr_page($pagination);
      $url = base_url( ) ;
      $project_url = project_url( ) ;


      $this->load->view('photo_gallery/headers');

      $data = array( ) ;
      $data['project_url'] = $project_url ;
      $data['gallery_name'] = $gallery_name ;
      $data['user_profile'] = $user_profile ;
      $data['pagination'] = $pagination ;
      $data['photos'] = $photos ;
      $data['url'] = $url ;
      $data['provider'] = $provider ;

      $this->load->view('photo_gallery/Index_page_responsive',$data);



      }} ?>
