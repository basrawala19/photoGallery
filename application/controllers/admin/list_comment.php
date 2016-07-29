<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class List_comment extends CI_Controller{
    
    
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
?>

        <div id="main" >

        <div id="status">
        Welcome <?php echo $this->session->userdata('username');?>&nbsp;&nbsp;&nbsp;
        <a href="<?php echo $url."logout/";?>">Log Out</a>
        </div>
        <?php 
        echo $this->functions->message($message) ;
        
        $comment = new comment( ) ;
        $comments = $comment->find_by_photoid($_GET['id']); ?>
            
        <div id="comment" >
        <?php foreach ($comments as $cmt ) { 

                 echo $cmt->author ; ?> wrote
                <br /><?php echo $cmt->body ; ?> 
                <br /><?php echo $cmt->time_?> &nbsp;&nbsp;&nbsp;<a href="<?php echo $url."delete_comment/index?id=".$cmt->id; ?>&photo_id=<?php echo $cmt->photo_id ;?>">Delete</a>	<br /><br /><br />
        <?php 
        } 
        ?>
        </div>
        </div>
<?php $this->load->view("photo_gallery/admin_footers.php"); }}?>
