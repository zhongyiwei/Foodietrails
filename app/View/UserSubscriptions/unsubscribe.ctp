<?php $this->assign('title', "Foodie Trails - Unsubscription"); ?>
<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create('UserSubscription'); ?>
<fieldset>
    <?php
    echo $this->Form->input('user_email',array('label'=>'Email'));
    ?>
    <div class="<?php
    if (isset($Error)) {
        echo $Error[1];
    }
    ?>" style="padding:0px;margin-bottom: 0px">
        <?php
        require_once('recaptchalib.php');
        echo recaptcha_get_html($publicKey);
        if (isset($Error)) {
            echo $Error[0];
        }
        ?>
    </div>
    <?php echo $this->Form->end(__('Unsubscribe News')); ?>
</fieldset>
<?php $this->end(); ?>