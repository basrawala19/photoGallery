
<?php  //$this->load->view ('photo_gallery/admin_headers.php') ; ?>

<div id="main" >

<div id="status" align="right" style="padding-top:6em;"><a href="<?php echo base_url()."gallery_index/index/";?>">Public Area</a></div>

<?php
 echo $message ;
?>
<br />
<div align="center">

    <?php echo $form_errors; ?>
    <h2>Login</h2>
    <form action="#" method="post">
        <table cellspacing="5" cellpadding="0">
            <tr><td >Username : </td><td><input type="text" name="username"  value="<?php echo $username;?>"/></td></tr>
            <tr><td>Password : </td><td><input type="password" name="password" /></td></tr>
            <tr><td colspan="2" align="center"><input type="submit" name="sub" id="sub" value="Submit"/></td></tr>
        </table>

    </form>

</div>
</div>
<?php
$this->load->view ('photo_gallery/footers.php') ;
?>
