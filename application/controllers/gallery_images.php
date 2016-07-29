<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_images extends CI_Controller{

    public function index (  ) {
    //  $this->load->view();

    $this->load->model('photograph');

    $query = "SELECT * FROM photograph WHERE gallery_name LIKE '".$_GET['gallery_name']."'" ;

    $photos = photograph::find_by_sql($query); ?>
    <div id="#ajax-data">

    <?php foreach ($photos as $photo ) : ?>


          <a class="fancybox" rel="<?php echo $_GET['gallery_name'];  ?>" href="http://localhost/CodeIgniter_2.2.0/<?php echo $photo->image_path()?>"><img src="http://localhost/CodeIgniter_2.2.0/<?php echo $photo->image_path()?>" width='400' height ='300' vspace="10" hspace="2"/></a>

    <?php endforeach ; ?>
  </div>
<?php
  }

}

?>
