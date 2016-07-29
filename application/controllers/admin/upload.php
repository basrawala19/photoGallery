<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller{


    public function index ( ) {
        $this->load->view('photo_gallery/admin_headers');
        $this->load->library('functions');
        $this->load->model('comment');
        $this->load->model('photograph');
        $this->load->model('pagination');
        $this->session->userdata('is_login') == NULL ? $this->functions->redirect_to (base_url()."admin/login/") : NULL ;
        $url = base_url( )."admin/" ;
        $message = $this->session->userdata('message') ? $this->session->userdata('message') : "" ;
        $this->session->set_userdata('message',"");
        $gn = "" ;
        if ( isset($_POST['submit'] ) ) {

                $photograph = new photograph( ) ;
                $photograph->caption = $_POST['caption'] ;
                $photograph->gallery_name = $_POST['gallery_name'];
                $gn = $_POST['gallery_name'];
                if ( !$photograph->save($_FILES['file_upload']) ) {

                        $message = $this->functions->message($photograph->give_errors( )) ;

                }
                else{

                        $this->session->set_userdata('message','PHOTO SUCCESSFULLY UPLOADED') ;

                        $this->functions->redirect_to( $url."list_photos/index?gallery_name=".$gn);
                }


        }
        ?>
        <?php
        $this->load->view("photo_gallery/upload_view",array('url'=>$url , 'message' => $message , 'gallery_name' => $gn ));
        $this->load->view("photo_gallery/admin_footers.php"); }}?>
