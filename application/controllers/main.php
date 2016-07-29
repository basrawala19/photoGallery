<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
                //$this->load->library('input');
                //$this->load->helper('form');
                
                $this->load->view('form.php');
        
	}
        
        public function insert_user ( $email , $password ) {
            
            $this->load->model ('Users') ;
            
            $this->Users->email = $email ;
            $this->Users->password= $password ;
            $this->Users->id = 1 ;
            //if ( isset($this->Users->id)) {echo "fg" ;}
            //$this->id = NULL ;
            $this->Users->save( ) ;
            //if ( isset($this->Users->id)) {echo "fg" ;}
        //    $this->users->insert( ) ;
            //echo $id ;
        }
        
        public function members ( ) {
            
            if ($this->session->userdata('is_logged_in')){
                
                $this->load->view('form_success.php') ;
            }
            else{
                
                $this->load->view('restricted_area.php');
            }
            
            
        }
        public function logout ( ) {
            
            
            $this->session->sess_destroy( ) ;
            redirect('Main/index');
        }
        
        public function validation ( ) {
            
                $this->load->library('form_validation');
               
                $this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials');
                $this->form_validation->set_rules('password','Password','required|trim');
          
                if ( $this->form_validation->run()){
                    
                    $data = array(
                        'email' => $this->input->post('email'),
                        'is_logged_in' => 1  
                    ) ;
                    
                    $this->session->set_userdata($data) ;
                    redirect('Main/members');
                }else{
                    $this->load->view('form.php');
                }
        }
        
        public function validate_credentials ( ) {
            
            $this->load->model('users');
            
            if (!$this->users->can_login( ) ){
                $this->form_validation->set_message( 'validate_credentials','Incorrect username|password');
                return false ;
            }
            return true ;
                       
        }
}


/* End of file welcome.php */
 /* Location: ./application/controllers/welcome.php */
?>