<?php
/* @var $this BarangayController */
/* @var $model Barangay */

$this->breadcrumbs=array(
	'Barangays'=>array('index'),
	$model->barangay_id=>array('view','id'=>$model->barangay_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Barangay', 'url'=>array('index')),
	array('label'=>'Create Barangay', 'url'=>array('create')),
	array('label'=>'View Barangay', 'url'=>array('view', 'id'=>$model->barangay_id)),
	array('label'=>'Manage Barangay', 'url'=>array('admin')),
);
?>

<h1>Update Barangay <?php echo $model->barangay_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>