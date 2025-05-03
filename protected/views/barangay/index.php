<?php
/* @var $this BarangayController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Barangays',
);

$this->menu=array(
	array('label'=>'Create Barangay', 'url'=>array('create')),
	array('label'=>'Manage Barangay', 'url'=>array('admin')),
);
?>

<h1>Barangays</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
