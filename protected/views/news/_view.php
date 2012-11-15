

<div class="view">



    <h3>
        <?php echo CHtml::encode($data->name); ?></h3>
    <br />


    <ul class="thumbnails">
        <li class="span2">
            <a href="#" class="thumbnail">

                <?php
               echo CHtml::image(Yii::app()->baseUrl."/images/news/".$data->urlpic, $data->urlpic) ;
                ?>
            </a>
        </li>
    </ul>
    <br />

    <?php echo $data->body; ?>
    <br />






    <b><?php echo CHtml::encode($data->getAttributeLabel('putdate')); ?>:</b>
    <?php echo CHtml::encode($data->putdate); ?>
    <br />







    <br/>
    <?php
    echo CHtml::link(CHtml::encode(Yii::t('site','read_more')), array('view', 'id' => $data->news_id), array('class' => 'btn'));
    ?>
    
</div>
<br/>
