<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Create_user extends CI_Controller{


    public function index ( ) {



                        $username = $this->input->get('username') ;
                        $password = $this->input->get('password');
                        $first_name = $this->input->get('first_name');
                        $last_name = $this->input->get('last_name');
                        //echo $username ;
                        //$this->load->view('photo_gallery/aadmin_headers.php');
                        //$required_feilds = array( "username" => 32 , "password" => 8 ) ;
                        //$errors = $this->validation_functions->validate_presence ( $required_feilds ) ;?>
                        <html><body>


                              <?php  $this->load->model('users') ;
                                $users = new Users( ) ;
                                if ( $users->create($_GET) ){

                                        $this->session->set_userdata('message','User Created Successfully');
                                        echo "<div id=\"pp\">true</div>" ;

                                }
                                else{
                                        //$username = $this->input->post('username') ;
                                        $this->session->set_userdata('message','Error Creating User');
                                        echo "<div id=\"pp\">false</div>" ;
                                }
                }
    }?>
</body>
</html>
