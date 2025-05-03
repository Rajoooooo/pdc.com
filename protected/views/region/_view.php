<?php
/* @var $this RegionController */
/* @var $data Region */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('region_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->region_id), array('view', 'id'=>$data->region_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region_name')); ?>:</b>
	<?php echo CHtml::encode($data->region_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region_description')); ?>:</b>
	<?php echo CHtml::encode($data->region_description); ?>
	<br />


</div>