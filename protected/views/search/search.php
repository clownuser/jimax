<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$this->pageTitle = Yii::app()->name . ' - Search results';
$this->breadcrumbs = array(
    'Search Results',
);
?>

<h3>Search Results for: "<?php echo CHtml::encode($term); ?>"</h3>
<?php if (!empty($results)): ?>


    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $data,
        'itemView' => '_parse',
       
        'pagerCssClass' => 'pagination-centered',
    ));
    ?>

<?php else: ?>
    <p class="error">No results matched your search terms.</p>
<?php endif; ?>

