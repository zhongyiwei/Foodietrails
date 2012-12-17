<?php $this->assign('title', "Foodie Trails - FAQ");?>
<h1 class="tourHeader">Frequently Asked Questions</h1>
<h2 class="tourParticipantGuide">Question and Answer</h2>
<p><?php foreach ($faqs as $faq): ?>
<tr>
    <td>
        Q: <?php echo $faq['Faq']['question']; ?><br />
        A: <?php echo $faq['Faq']['answer']; ?>"<p />
    </td>
</tr>
<?php endforeach; ?></p>
<?php // echo $this->Session->flash(); ?>

<?php echo $this->Form->create('Faq'); ?>
<fieldset>
    <?php
    echo $this->Form->input('question', array('id' => 'question', 'class' => 'ckeditor'));
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</fieldset>

<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'question',{
        filebrowserBrowseUrl : '/js/ckfinder/ckfinder.html',
        filebrowserWindowWidth : '600',
        filebrowserWindowHeight : '300'
    } ); 
    CKFinder.SetupCKEditor( ck_newsContent, 'ckfinder/') ;

</script>
<?php $this->end(); ?>