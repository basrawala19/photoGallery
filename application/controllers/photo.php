<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Photo extends CI_Controller{

    public function index (  ) {

        $this->load->helper('url') ;
        $provider = provider_not_connected( ) ;
        $service = is_logged_in ( $provider ) ;
        $user_profile = $service->getUserProfile( ) ;
        $user_profile->id = Hybrid_Auth::getUserId( $provider ) ;

        $this->load->view('photo_gallery/headers');
        $this->load->library('functions') ;
        $this->load->model('photograph') ;
        $this->load->model('comment');
        $this->load->model('thirdpartyuser');
        $message = $this->session->userdata('message') ? $this->session->userdata('message') : "" ;
        $this->session->set_userdata('message',"");
        $url = base_url( ) ;

        $photograph = new photograph( ) ;

        $photo = $photograph->find_by_id($_GET['id']);
        $body = "" ;

        if ( isset($_POST['submit']) ) {

                $comment = new comment( ) ;
                $_POST['photo_id'] = $_GET['id'] ;
                $_POST['user_id'] = $user_profile->id ;
                //echo "id is:" .$user_profile->id ;
                if ( !$comment->insert($_POST) ) {
                        $message = "Error Saving the Comment (Empty Body Field)";
                        echo "dffd" ;
                }else{

                  //echo "gdfgdF".$_POST['author'] ;
                }
        }

        ?>

        <div id="main">
            <div id="status">
            Welcome &nbsp;&nbsp;&nbsp;
            <?php echo "<a href='" .$user_profile->profileURL."'>". $user_profile->firstName ."</a>"   ?> &nbsp;&nbsp;&nbsp;

            <?php echo "<a href='" .$url."hauth/logout/".$provider."'>Logout</a>"   ?> &nbsp;&nbsp;&nbsp;
            </div>

            <?php echo ( $this->functions->message($message) ) ; ?>

            <div id="photo" >
            <a href="<?php echo $url."index_page/index/?gallery_name=".$_GET['gallery_name']; ?>" >&laquo; Back</a><br /><br />
            <img src="<?php echo "http://localhost/CodeIgniter_2.2.0/".$photo->image_path();?>" height="500" width="600"/>


            <?php
            $comments = comment::find_by_photoid($_GET['id']) ;?>
            <div id="comment" >
            <?php foreach ($comments as $cmt ) {?>
            <br /><br /><br />
            <?php //echo $cmt->author ;

              $ext_user = thirdpartyuser::find_by_id ( $cmt->user_id ) ;

              if ( $ext_user )
                {
                  echo "<a href='".$ext_user->profileURL."'>".$ext_user->firstName."</a>" ;
                }
            ?> wrote
            <br /><?php echo $cmt->body ; ?>
            <br /><?php echo $cmt->time_ ;?><?php
            }

            ?>
            </div>

            <form action="#" method="post">
                <h3>New Comment </h3>
                <table cellspacing="4" cellpadding="0">
                <!--<tr><td>Author:</td><td><input type="text" name="author"   /></td></tr><br />-->
                <tr><td align="">Body:</td><td><textarea name="body" rows="8" cols="30"></textarea></td></tr>
                <tr><td colspan="2"><input type="submit" name="submit" value="Post_Comment" /></td></tr>
                </table>
            </form>
            </div>
            </div>
<?php $this->load->view("photo_gallery/footers.php"); }}?>
