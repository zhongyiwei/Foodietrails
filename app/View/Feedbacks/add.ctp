<div class="">
    <?php echo $this->Form->create('Feedback'); ?>
    <fieldset>
		<?php
		echo $this->Form->input('full_name');
		echo $this->Form->input('feedback_description', array('id' => 'feedback_description', 'class' => 'ckeditor'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'feedback_description',{
        filebrowserBrowseUrl : '/js/ckfinder/ckfinder.html',
        filebrowserWindowWidth : '600',
        filebrowserWindowHeight : '300'
    } ); 
   CKFinder.SetupCKEditor( ck_newsContent, 'ckfinder/') ;

</script>
<?php $this->end(); ?>
