<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Edit_user extends CI_Controller{

    public function index (  ) {

                        $username = $this->input->get('username') ;
                        $password = $this->input->get('password');
                        $first_name = $this->input->get('first_name');
                        $last_name = $this->input->get('last_name');

                        $this->load->model('users') ;
                        $user = new Users ( ) ;
                        //$_POST['id'] = $_GET['id'] ;
                        
                        if ( $user->update($_GET) ){

                                $this->session->set_userdata('message','User Info Updated Successfully');
                                echo "<div id=\"pp\">true</div>" ;
                        }
                        else{
                                $message = "Error Updating User";
                                echo "<div id=\"pp\">false</div>" ;
                        }

    }
}
