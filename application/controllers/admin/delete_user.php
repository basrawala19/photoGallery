<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Delete_user extends CI_Controller{
    
    public function index ( $id ) {
   
	
	$this->session->userdata('is_login') == NULL ? $this->functions->redirect_to (base_url()."admin/login/") : NULL ;

	if ( !isset($id) ) {
		$session->messages("Deletion failed user not found ");
		
	}	
	else{
                $this->load->model('users');
                $user = new Users() ;
		if ( $user->delete($id) )
		{$this->session->set_userdata('message','User successfully deleted');}
		else{
			$this->session->set_userdata('message','Deletion failed user not found ');
		}
	}
	$this->load->library('functions') ;
	$this->functions->redirect_to (base_url()."admin/manage_admins/") ;
    }
}
?>