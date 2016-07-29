<?php

 if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Login_model_window extends CI_Controller{


    function index ( ) {

         $username = $this->input->get('username');
	       $password = $this->input->get('password');

        $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
        $this->load->model('users')  ;
        $user = new Users() ;
	      $object_array = $user->find_by_sql( $query ) ;

	      if ( empty($object_array) ) {
                echo "<div id='pp'>false</div>";
	      }else{
		    $object = array_shift($object_array);
        $data = array (
                          'username' => $object->username,
                          'is_login' => 1,
                          'message' => 'Login Sucessful'
                      ) ;
		    $this->session->set_userdata($data);
        echo "<div id='pp'>true</div>";

    }
  }
}
?>
