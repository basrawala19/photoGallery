<h2>Form Login</h2>
<?php echo validation_errors( ); ?>
<?php  echo form_open('Main/validation'); ?>
    <p>
        <label for='username'>Username:</label>
        <?php echo form_input('email',$this->input->post('email')); ?>
    </p>
    
    <p>
        <label for="password">Password:</label>
        <?php echo form_password('password',$this->input->post('password')); ?>
    </p>
   <?php echo form_submit('login_submit','Login'); ?>
 <?php form_close( ); ?>

