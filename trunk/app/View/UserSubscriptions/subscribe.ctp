<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create('UserSubscription'); ?>
<fieldset>
    <?php
    echo $this->Form->input('user_email');
    ?>
    <?php echo $this->Form->end(__('Subscribe News')); ?>
</fieldset>
<?php $this->end(); ?>
