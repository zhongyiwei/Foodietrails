<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your email address and password'); ?></legend>
    <?php
        echo $this->Form->input('Email Adress');
        echo $this->Form->input('Password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>