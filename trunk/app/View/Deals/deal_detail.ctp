<?php $this->assign('title', 'Foodie Trails - Food Tours Melbourne, Gourmet Walking Tour, Walking Food Tour, Walking Tours Melbourne ');?>

<?php
if ($content != null){
echo $content[0]['Deal']['content'];
}else{
    echo "No Deals Available";
}
?>
