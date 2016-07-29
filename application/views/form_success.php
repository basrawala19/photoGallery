<?php

echo "<pre>" ;
print_r ( $this->session->all_userdata( ) ) ;
echo "</pre>";
$this->load->helper ( 'url' ) ;
?>

<a href="<?php echo (base_url()."index.php/main/logout") ; ?> "> LOGOUT </a>