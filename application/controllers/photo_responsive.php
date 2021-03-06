
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Photo_responsive extends CI_Controller{

    public function index (  ) {

        $this->load->helper('url') ;
        $provider = provider_not_connected( ) ;
        $service = is_logged_in ( $provider ) ;
        $user_profile = $service->getUserProfile( ) ;
        $user_profile->id = Hybrid_Auth::getUserId( $provider ) ;
        $this->load->view('photo_gallery/headers');
        $this->load->library('functions') ;
        $this->load->model('photograph') ;
        $this->load->model('comment');
        $this->load->model('thirdpartyuser');
        $message = $this->session->userdata('message') ? $this->session->userdata('message') : "" ;
        $this->session->set_userdata('message',"");
        $url = base_url( ) ;
        $project_url = project_url( ) ;
        $id = $_GET['id'] ;

        $photograph = new photograph( ) ;
        $photo = $photograph->find_by_id($id);
        $gallery = $_GET['gallery_name'] ;
        $body = "" ;

        $data = array( ) ;
        $data['id'] = $id ;
        $data['gallery'] = $gallery ;
        $data['user_profile'] = $user_profile ;
        $data['photo'] = $photo ;
        $data['url'] = $url ;
        $data['provider'] = $provider ;
        $data['body'] = $body ;
        $data['project_url'] = $project_url ;
        $this->load->view('photo_gallery/photo_responsive',$data);




}} ?>
