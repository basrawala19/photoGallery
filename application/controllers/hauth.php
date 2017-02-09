<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hauth extends CI_Controller {

	public function index()
	{

		$this->load->helper('url');
		provider_connected( ) ;
		//$this->load->view ('photo_gallery/headers.php') ;
		//$this->load->view('photo_gallery/login_thirdParty.php');
		$this->load->view('photo_gallery/login_responsive') ;
		//$this->load->view ('photo_gallery/footers.php') ;

	}

	public function login($provider)
	{

		log_message('debug', "controllers.HAuth.login($provider) called");
		$this->load->helper('url');
		$this->load->library('HybridAuthLib');

		try
		{

			log_message('debug', 'gela akela controllers.HAuth.login: loading HybridAuthLib');
			if ($this->hybridauthlib->providerEnabled($provider))
			{
				log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");
				$service = $this->hybridauthlib->authenticate($provider);

				if ($service->isUserConnected())
				{
					$user_profile = $service->getUserProfile();
					$this->load->model('thirdpartyuser');
					$user = thirdpartyuser::find_by_external_id ( $user_profile->external_id , $user_profile->provider ) ;

					if ( !$user ){

							Hybrid_Logger::info( 'hatim user not found inserting...');
							$id = thirdpartyuser::insert( $user_profile ) ;
							if ( !$id ) {

								log_message('error', 'error saving the user info');
								show_404($_SERVER['REQUEST_URI']);

							}else{

								Hybrid_Auth::setUserId ($id,$provider) ;
							}

					}
					else
					{

							Hybrid_Auth::setUserId ($user->id,$provider) ;
					}
					log_message('info', 'controllers.HAuth.login: user profile:'.PHP_EOL.print_r($user_profile, TRUE));

					header ("Location: ".base_url( )."gallery_index/index/") ;
					exit ;

				}
				else // Cannot authenticate user
				{
					show_error('Cannot authenticate user');
				}
			}
			else // This service is not enabled.
			{
				log_message('error', 'controllers.HAuth.login: This provider is not enabled ('.$provider.')');
				show_404($_SERVER['REQUEST_URI']);
			}
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			switch($e->getCode())
			{
				case 0 : $error = 'Unspecified error.'; break;
				case 1 : $error = 'Hybriauth configuration error.'; break;
				case 2 : $error = 'Provider not properly configured.'; break;
				case 3 : $error = 'Unknown or disabled provider.'; break;
				case 4 : $error = 'Missing provider application credentials.'; break;
				case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
				         //redirect();
				         if (isset($service))
				         {
				         	log_message('debug', 'controllers.HAuth.login: logging out from service.');
				         	$service->logout();
				         }
				         show_error('User has cancelled the authentication or the provider refused the connection.');
				         break;
				case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
				         break;
				case 7 : $error = 'User not connected to the provider.';
				         break;
			}

			if (isset($service))
			{
				$service->logout();
			}

			log_message('error', 'controllers.HAuth.login: '.$error);
			show_error('Error authenticating user.');
		}

	}

	public function endpoint()
	{

		log_message('debug', 'controllers.HAuth.endpoint called.');
		log_message('info', 'controllers.HAuth.endpoint: $_REQUEST: '.print_r($_REQUEST, TRUE));

		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			log_message('debug', 'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
			$_GET = $_REQUEST;
		}

		log_message('debug', 'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
		require_once APPPATH.'/third_party/hybridauth/index.php';

	}

	public function logout($providerId){

			$this->load->library('HybridAuthLib');
			if ($this->hybridauthlib->providerEnabled($providerId))
			{
				if ($this->hybridauthlib->isConnectedWith($providerId))
				{
					$service = $this->hybridauthlib->getAdapter($providerId) ;
					$service->logout();

				}
				header ("Location: ".base_url( )."hauth/index/") ;
				exit ;
			}
			else // This service is not enabled.
			{
				log_message('error', 'controllers.HAuth.login: This provider is not enabled ('.$providerId.')');
				show_404($_SERVER['REQUEST_URI']);
			}

	}
}

/* End of file hauth.php */
/* Location: ./application/controllers/hauth.php */
