<div class="">
    <?php echo $this->Form->create('Feedback'); ?>
    <fieldset>
		<?php
		echo $this->Form->input('full_name');
		echo $this->Form->input('feedback_description');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>


<?php $this->end(); ?>
