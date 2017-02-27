<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->helper('url') ;
		//$this->load->view('photo_gallery/grayScale') ;
		$this->load->view('photo_gallery/headers.php');

		$this->load->helper('url') ;
		$provider = provider_not_connected( 1 ) ;
		$data = array( ) ;
		if ( $provider != null )
		{
			$service = is_logged_in ( $provider ) ;
			$user_profile = $service->getUserProfile( ) ;
			$data['user_profile'] = $user_profile ;
		}


		$this->load->view('photo_gallery/landingPage',$data);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
