<div >
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->Form->create('giftvouchers', array('action' => "redeem", 'type' => 'get')); ?>
    <table width="200" border="0" style="margin-bottom: 90px; margin-top:50px;">
        <tr>
            <td colspan="2"> <span style="font-weight:normal; margin-left: 250px;color:#666; font-size:25px;"><?php echo __('Please choose holding date below: '); ?></span></td>
        </tr>
        <tr>
            <td width="620px" style="vertical-align: middle">    <?php
    echo $this->Form->input("$date", array('label' => false, 'style' => 'margin-left: 180px; width:400px;', 'options' => $Dates));
    echo $this->Form->input('id', array('type' => 'hidden', 'default' => "$id"));
    echo $this->Form->input('def', array('type' => 'hidden', 'default' => "$def"));
    ?></td>
            <td><?php
                $options = array(
                    'label' => 'Procced Next',
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