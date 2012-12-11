<?php $this->assign('title', 'Foodie Trails - Food Tours Melbourne, Gourmet Walking Tour, Walking Food Tour, Walking Tours Melbourne ');?>

<div >
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->Form->create('GiftvoucherOrder'); ?>
    <table width="200" border="0" style="margin-bottom: 90px; margin-top:50px;">
        <tr>
            <td colspan="2"> <span style="font-weight:normal; margin-left: 250px;color:#666; font-size:25px;"><?php echo __('Please enter your redeem code below: '); ?></span></td>
        </tr>
        <tr>
            <td width="620px">    <?php
    echo $this->Form->input('gift_redeem_code', array('label' => false, 'style' => 'margin-left: 180px; width:400px;'));
    ?></td>
            <td><?php
                $options = array(
                    'label' => 'Submit',
                    'div' => array(
                        'class' => ' submit',
                        'style' => 'margin-top:0px'
                    )
                );
                echo $this->Form->end($options);
    ?></td>
        </tr>
    </table>
</div>