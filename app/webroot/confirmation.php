<?php
    setcookie("payer_id", $_GET["PayerID"]);
?>
Please wait for redirecting
<script language="javascript" type="text/javascript">
    window.setTimeout('window.location="http://localhost/confirmationLanding.php"; ',0);
</script>