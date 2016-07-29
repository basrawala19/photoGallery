<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Delete_photo extends CI_Controller{
    
    
    public function index ( ) {
        
        $this->load->library('functions');
        $this->load->model('comment');
        $this->session->userdata('is_login') == NULL ? $this->functions->redirect_to (base_url()."admin/login/") : NULL ;
        $url = base_url( )."admin/" ;

        if ( !isset($_GET['id'] ) ) {
                $this->session->set_userdata('message','photo not found');
                $this->functions->redirect_to ($url."list_photos/");
        }
        else{
        $this->load->model('photograph') ;        
        $photo = photograph::find_by_id($_GET['id']);
        //echo $photo->image_path( ) ;
        if ( $photo->delete ( ) ){
                $this->session->set_userdata('message','deletion successful');
             
        }else{
                $this->session->set_userdata('message','photos not found');
        }

                $this->functions->redirect_to ($url."list_photos/");
        }

    }
}?>