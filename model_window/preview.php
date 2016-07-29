
class Preview extends

<html>
<head>
</head>

<body>
HATIM ALI BASRA WALA<br />
<a href="www.google.com">navigate</a>
<style="float:left; display:block; border:2px;" ><img src="../../../images/1.png" height=200 /></style>
<form action="#" id="contact" method="post">
  <input type="text" id="un" />
  <input type="submit" id="sub" value="GO" />
</form>
<?php $id = $_GET['id'];

  $this->load->model('photograph') ;
  $photo = photograph::find_by_id( $id ) ; ?>

  <img src="http://localhost/CodeIgniter_2.2.0/ <?php echo $photo->image_path(); ?>" width='200' height ='200' vspace="10" hspace="10"/>


?>




</body>
</html>
