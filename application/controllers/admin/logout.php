<?php


class Logout extends CI_Controller{

    
        public function index ( ) {
           
            /*$this->session->set_userdata(
                array('is_login' => 0)
            );*/
            $this->session->sess_destroy( )  ;
            $this->load->library('functions');
            $this->functions->redirect_to( base_url()."admin/login/" ) ;

        }
}

?>