<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->

<div class="clearfix"></div>
    <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header"><?php echo CHtml::encode(Yii::t('site','last_news'))?></li>
<?php foreach($rows as $row):?>

    <p><?php  echo CHtml::link($row->name,array("/".strtolower($name)."/view/id/{$row->news_id}/")); ?> </p>  

<?php endforeach; ?>
            
               </ul>
          </div>

