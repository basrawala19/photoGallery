<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Preview_responsive extends CI_Controller{


  public function index( ) {


      $this->load->helper('url') ;
      $provider = provider_not_connected( ) ;
      $user_id = Hybrid_Auth::getUserId( $provider ) ;
      $this->load->model('photograph');
      $this->load->model('thirdpartyuser');
      $this->load->model('comment');
      $url = base_url( );
      $project_url = project_url( ) ;
      $id = $_GET['id'];
      $gallery_name = isset($_GET['gallery_name'])? $_GET['gallery_name'] : "" ;
      $photo = photograph::find_by_id($id) ;

      $this->load->view('photo_gallery/preview_header');

      $data = array( ) ;
      $data['user_id'] = $user_id ;
      $data['url'] = $url ;
      $data['id'] = $id ;
      $data['gallery_name'] = $gallery_name ;
      $data['photo'] = $photo ;
      $data['provider'] = $provider ;
      $data['project_url'] = $project_url ;
      $this->load->view ('photo_gallery/Preview_responsive',$data) ;


    }}?>
