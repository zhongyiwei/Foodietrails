<div class="">
    <?php echo $this->Form->create('Feedback'); ?>
    <fieldset>
        <?php
        echo $this->Form->input('first_name');
        echo $this->Form->input('feedback_description');
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
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $this->end(); ?>
