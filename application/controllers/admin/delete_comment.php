<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Delete_comment extends CI_Controller{
    
    
    public function index ( ) {
        
        $this->load->library('functions');
        $this->load->model('comment');
        $this->session->userdata('is_login') == NULL ? $this->functions->redirect_to (base_url()."admin/login/") : NULL ;
        $url = base_url( )."admin/" ;

        if ( !isset($_GET['id']) ) {

                $this->session->set_userdata('message','comment not found');
                $this->functions->redirect_to ( $url."list_photos/");

        }

        if ( !isset($_GET['photo_id']) ) {

                $this->session->set_userdata('message','comment not found');
                $this->functions->redirect_to ($url."list_photos/");

        }
        
        
        $comment = new comment ( ) ;
        $comment->id = $_GET['id'] ;
        if ( $comment->delete (  ) ){

                $this->session->set_userdata('message','deletion successful');
                $this->functions->redirect_to ($url."list_comment/?id={$_GET['photo_id']}" );

        }else{

                $this->session->set_userdata('message','comment not found');
                $this->functions->redirect_to ($url."list_photos/");
        }


    }
}?>