<?php
/* @var $this BarangayController */
/* @var $model Barangay */

$this->breadcrumbs=array(
	'Barangays'=>array('index'),
	$model->barangay_id,
);

$this->menu=array(
	array('label'=>'List Barangay', 'url'=>array('index')),
	array('label'=>'Create Barangay', 'url'=>array('create')),
	array('label'=>'Update Barangay', 'url'=>array('update', 'id'=>$model->barangay_id)),
	array('label'=>'Delete Barangay', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->barangay_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Barangay', 'url'=>array('admin')),
);
?>

<h1>View Barangay #<?php echo $model->barangay_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'barangay_id',
		'city_id',
		'barangay_name',
	),
)); ?>
