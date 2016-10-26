<?php
	var_dump($user_profile);
	$this->load->helper('url');
	$url = base_url( ) ;
	//echo $url ;
	echo "<a href='" . $url . "hauth/logout/" . $providerId ."'>LogOut</a>" ;
?>
