<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
  $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
       'pagerCssClass'=>'pagination-centered',
));
?>
