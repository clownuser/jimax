<?php $this->pageTitle = Yii::app()->name; ?>


<?php // $this->widget('CStarRating', array('name' => 'rating')); ?>



<?php //echo base64_encode('passwmark') ?>


<?php // echo md5('pupa') ; ?>

<?php 

$str = 'clownada';
$str = strrev($str);
echo $r = base64_encode($str);
$r = strrev(base64_decode($r));
//echo $r;


?>












