<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_index extends CI_Controller{


    public function index ( ) {
        $this->load->library('functions');
        $this->session->userdata('is_login') == NULL ? $this->functions->redirect_to (base_url()."admin/login/") : NULL ;
        $this->load->view('photo_gallery/admin_headers.php');
        $url = base_url( )."admin/" ;
        $message = $this->session->userdata('message') ? $this->session->userdata('message') : "" ;
        $this->session->set_userdata('message',"") ;
        ?>

        <div id="main" >
        <div id="status">
            Welcome <?php echo $this->session->userdata('username');?>&nbsp;&nbsp;&nbsp;
            <a href="<?php echo $url."logout/"; ?>">Log Out</a>
        </div>

        <?php
           echo ( $this->functions->message($message) ) ; ?>

        <ul style=" margin:0em; padding:3em 18em; font-size:16px; list-style:square; line-height:1.5em">
        <li><a href="<?php echo ($url."gallery_index/") ?>">List_photos</a></li>
        <li><a href="<?php echo ($url."manage_admins/") ?>">Log File</a></li>
        <li><a href="<?php echo ($url."logout/") ?>">Log Out</a></li>
        </ul>
        </div>
        <?php $this->load->view("photo_gallery/admin_footers.php"); }

    }?>
