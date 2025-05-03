<?php
/* @var $this BarangayController */
/* @var $model Barangay */

$this->breadcrumbs=array(
	'Barangays'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Barangay', 'url'=>array('index')),
	array('label'=>'Manage Barangay', 'url'=>array('admin')),
);
?>

<h1>Create Barangay</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>