<?php $this->assign('title', 'Foodie Trails - Deals');?>

<?php
if ($content != null){
echo $content[0]['Deal']['content'];
}else{
    echo "No Deals Available";
}
?>