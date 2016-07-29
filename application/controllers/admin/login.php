<?php

 if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{


    function index ( ) {

        $this->load->library( 'validation_functions.php' ) ;
        $this->load->library( 'functions.php' ) ;
        $this->session->userdata('is_login') != 0 ? $this->functions->redirect_to (base_url( )."admin/admin_index/") : NULL ;
        $message = $this->session->userdata('message') ? $this->session->userdata('message') : "" ;
        $this->session->set_userdata('message',"");
	      $username ="";
        $errors = array();
        $this->load->view ('photo_gallery/admin_headers.php') ;

        if ( $this->input->post('sub') ){

          		$username = $this->input->post('username');
          		$password = $this->input->post('password');

          		$required_feilds = array( "username" => 32 , "password" => 8 ) ;

          		$errors = $this->validation_functions->validate_presence ( $required_feilds ) ;

          		if ( empty($errors) ) {

                                  $message = self::validate( $errors ) ;

          		}

      	 }

        $data = array() ;

        if ( empty($message) ) {

            $message = "PLEASE LOGIN" ;
        }
        $data['message'] = $this->functions->message($message) ;

        $data['form_errors'] = $this->validation_functions->form_errors($errors) ;
        $data['username'] = $username ;

        $this->load->view('photo_gallery/login.php',$data);

    }



    function validate ( $errors ) {

         $username = $this->input->post('username');
	       $password = $this->input->post('password');

        $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
        $this->load->model('users')  ;
        $user = new Users() ;
	      $object_array = $user->find_by_sql( $query ) ;

	      if ( empty($object_array) ) {
                $message = "incorrect username/password<br /><br />" ;
	      }else{
		    $object = array_shift($object_array);
        $data = array (
                          'username' => $object->username,
                          'is_login' => 1,
                          'message' => 'Login Sucessful'
                      ) ;
		    $this->session->set_userdata($data);
		    $this->functions->redirect_to(base_url( )."admin/admin_index/");
	     }
       return $message ;
    }
}
?>
