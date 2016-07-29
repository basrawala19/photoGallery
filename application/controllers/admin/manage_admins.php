<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manage_admins extends CI_Controller{


    public function index ( ) {
        $this->load->library('functions');
        $this->session->userdata('is_login') == NULL ? $this->functions->redirect_to (base_url()."admin/login/") : NULL ;
        $this->load->view('photo_gallery/admin_headers.php');
        $message = $this->session->userdata('message') ? $this->session->userdata('message') : "" ;
        $this->session->set_userdata('message',"");
        $url = base_url( )."admin/" ;
?>
    <div id="main" >
    <div id="status">
    Welcome <?php echo $this->session->userdata('username');?>&nbsp;&nbsp;&nbsp;
    <a href="<?php echo $url."logout/"; ?>">Log Out</a>
    </div>

    <?php  echo ( $this->functions->message($message) ) ; ?>

    <div style="margin:0; padding:4em 6em;">

    <table border="0"  cellpadding="8">
    <tr><th width="600px">Users</th><th>Actions</th></tr>
    <?php
    $this->load->model('users');
    $users = new Users( ) ;
    $results = Users::find_all() ;

    foreach ( $results as $result ) { ?>
	<tr><td align="center"><?php echo $result->username; ?></td><td><a href=""><span id="<?php echo $result->id ; ?>" class="e_user">Update User </span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $url."delete_user/index/".$result->id ; ?>" onclick="return confirm('ARE YOU SURE')">Delete</a></td></tr>

    <?php
    }
    ?>

    </table>

    <div  style="padding:4em 26em;" >

    <?php $this->load->view('photo_gallery/create_user.php'); ?>
    <?php $this->load->view('photo_gallery/edit_user.php'); ?>

    <a href=""><span class="c_user">+Create new user</span></a>
    </div>
    </div>




    </div>
    <?php
    $this->load->view("photo_gallery/admin_footers.php");
    }
}?>
