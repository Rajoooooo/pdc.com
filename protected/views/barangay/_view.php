<?php
/* @var $this BarangayController */
/* @var $data Barangay */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('barangay_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->barangay_id), array('view', 'id'=>$data->barangay_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::encode($data->city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('barangay_name')); ?>:</b>
	<?php echo CHtml::encode($data->barangay_name); ?>
	<br />


</div>