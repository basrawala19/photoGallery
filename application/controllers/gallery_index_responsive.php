<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_index_responsive extends CI_Controller{

    public function index ( ) {

       $this->load->helper('url') ;
       $provider = provider_not_connected( ) ;
       $service = is_logged_in ( $provider ) ;
       $user_profile = $service->getUserProfile( ) ;
       $this->load->model('gallery');
       /*foreach ($user_profile as $key => $value) {
         # code...
         Hybrid_Logger::info($key." fgd " .$value) ;
       }*/

       $this->load->view('photo_gallery/headers');
       $project_url = project_url( ) ;
       $url = base_url( ) ;
       $data = array( ) ;
       $data['project_url'] = $project_url ;
       $data['url'] = $url ;
       $data['user_profile'] = $user_profile ;
       $data['provider'] = $provider ;
       $this->load->view('photo_gallery/gallery_index_responsive',$data) ;


     }}
        ?>
