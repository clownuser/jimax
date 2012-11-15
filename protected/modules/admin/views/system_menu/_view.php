
<div class="view well">
<?php echo Chtml::link("up", array("system_menu/index/id/{$data->id_catalog}/pos/up")); ?>
<br/>


    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::encode($data->name); ?>
   

    <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
    <?php echo CHtml::encode($data->description); ?>
    



    <b><?php echo CHtml::encode($data->getAttributeLabel('pos')); ?>:</b>
    <?php echo CHtml::encode($data->pos); ?>
    
    <?php echo CHtml::encode("Status:{$data->hide}:"); ?>

    <?php
    if ($data->hide == "show") {
        echo Chtml::link("hide", array("system_menu/index/id/{$data->id_catalog}/show/no"));
    } else {
        echo Chtml::link("show", array("system_menu/index/id/{$data->id_catalog}/show/yes"));
    }
    ?>
    
    <?php // echo CHtml::encode($data->findParentName($data->id_catalog));  ?>
    <br/>
    <?php echo CHtml::link(CHtml::encode("Change"), array('update', 'id' => $data->id_catalog), array('class' => 'btn')); ?>
    <br />
    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('id_parent')); ?>:</b>
      <?php echo CHtml::encode($data->id_parent); ?>
      <br />

     */ ?>
<br/>
<?php echo Chtml::link("down", array("system_menu/index/id/{$data->id_catalog}/pos/down")); ?>

</div>
