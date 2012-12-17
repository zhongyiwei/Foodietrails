<?php $this->assign('title', "Foodie Trails - Password Change Successful"); ?>
<div >
    <table width="200" border="0" style="margin-bottom: 90px; margin-top:50px;">
        <tr>
            <td style="text-align: center;width: 500px;font-size:large;">Your password has been changed successfully. Please check your email.</td>
        </tr>
        <tr>
  <td colspan="2" style=" text-align: center; ">Click <?php echo $this->Html->link(__('Here'), array('controller' => 'users', 'action' => 'homepageLogin')); ?> to Login </td>
        </tr>
    </table>
</div>