<div >
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend style="font-weight:normal;"><?php echo __('Please enter your email and password'); ?></legend>
        <?php
        echo $this->Form->input('user_email',array('label'=>'Email'));
        echo $this->Form->input('user_password', array('type' => 'password','label'=>'Password'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Login', array('class' => 'login'))); ?>
</div>