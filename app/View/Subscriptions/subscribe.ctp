
<?php echo $this->Form->create('User_subscription'); ?>
<fieldset>
    <?php
    echo $this->Form->input('user_email');
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</fieldset>
<?php $this->end(); ?>
