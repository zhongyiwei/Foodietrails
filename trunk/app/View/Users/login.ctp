<div class="login"> 
<h2>Login</h2>     
    <?php echo $form->create('User', array('action' => 'login'));?> 
        <?php echo $form->input('user_email');?> 
        <?php echo $form->input('user_password');?> 
        <?php echo $form->submit('Login');?> 
    <?php echo $form->end(); ?> 
</div> 