<?php
/* @var $form CActiveForm */
/* @var $account Account */
/* @var $user User */
?>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', [
    'id' => 'account-form',
    'enableAjaxValidation' => false,
]); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary([$account, $user]); ?>

<h3>Account Credentials</h3>

<div class="row">
    <?php echo $form->labelEx($account, 'username'); ?>
    <?php echo $form->textField($account, 'username'); ?>
    <?php echo $form->error($account, 'username'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($account, 'password'); ?>
    <?php echo $form->passwordField($account, 'password'); ?>
    <?php echo $form->error($account, 'password'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($account, 'email_address'); ?>
    <?php echo $form->textField($account, 'email_address'); ?>
    <?php echo $form->error($account, 'email_address'); ?>
</div>

<h3>Personal Information</h3>

<div class="row">
    <?php echo $form->labelEx($user, 'firstname'); ?>
    <?php echo $form->textField($user, 'firstname'); ?>
    <?php echo $form->error($user, 'firstname'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($user, 'middlename'); ?>
    <?php echo $form->textField($user, 'middlename'); ?>
    <?php echo $form->error($user, 'middlename'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($user, 'lastname'); ?>
    <?php echo $form->textField($user, 'lastname'); ?>
    <?php echo $form->error($user, 'lastname'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($user, 'qualifier'); ?>
    <?php echo $form->textField($user, 'qualifier'); ?>
    <?php echo $form->error($user, 'qualifier'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($user, 'dob'); ?>
    <?php echo $form->dateField($user, 'dob'); ?>
    <?php echo $form->error($user, 'dob'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($user, 'gender'); ?>
    <?php echo $form->dropDownList($user, 'gender', [1 => 'Male', 2 => 'Female'], ['prompt' => 'Select Gender']); ?>
    <?php echo $form->error($user, 'gender'); ?>
</div>

<h3>Address Information</h3>

<div class="row">
    <?php echo $form->labelEx($user, 'region_id'); ?>
    <?php echo $form->dropDownList($user, 'region_id',
        CHtml::listData(Region::model()->findAll(), 'region_id', 'region_name'),
        [
            'prompt' => 'Select Region',
            'ajax' => [
                'type' => 'POST',
                'url' => CController::createUrl('account/getProvinces'),
                'data' => ['region_id' => 'js:this.value'],
                'update' => '#User_province_id',
            ],
        ]
    ); ?>
    <?php echo $form->error($user, 'region_id'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($user, 'province_id'); ?>
    <?php echo $form->dropDownList($user, 'province_id', [], [
        'prompt' => 'Select Province',
        'ajax' => [
            'type' => 'POST',
            'url' => CController::createUrl('account/getCities'),
            'data' => ['province_id' => 'js:this.value'],
            'update' => '#User_city_id',
        ],
    ]); ?>
    <?php echo $form->error($user, 'province_id'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($user, 'city_id'); ?>
    <?php echo $form->dropDownList($user, 'city_id', [], [
        'prompt' => 'Select City',
        'ajax' => [
            'type' => 'POST',
            'url' => CController::createUrl('account/getBarangays'),
            'data' => ['city_id' => 'js:this.value'],
            'update' => '#User_barangay_id',
        ],
    ]); ?>
    <?php echo $form->error($user, 'city_id'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($user, 'barangay_id'); ?>
    <?php echo $form->dropDownList($user, 'barangay_id', [], ['prompt' => 'Select Barangay']); ?>
    <?php echo $form->error($user, 'barangay_id'); ?>
</div>


<h3>Position</h3>

<div class="row">
    <?php echo $form->labelEx($account, 'department_id'); ?>
    <?php echo $form->textField($account, 'department_id'); ?>
    <?php echo $form->error($account, 'department_id'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($account, 'position_id'); ?>
    <?php echo $form->textField($account, 'position_id'); ?>
    <?php echo $form->error($account, 'position_id'); ?>
</div>

<div class="row buttons">
    <?php echo CHtml::submitButton($account->isNewRecord ? 'Register' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>
</div>

<?php
Yii::app()->clientScript->registerScript('cascade-visibility', "
$(document).ready(function() {
	$('#User_province_id').closest('.row').hide();
	$('#User_city_id').closest('.row').hide();
	$('#User_barangay_id').closest('.row').hide();

	$('#User_region_id').change(function() {
		if ($(this).val()) {
			$('#User_province_id').closest('.row').show();
		} else {
			$('#User_province_id').closest('.row').hide();
			$('#User_city_id').closest('.row').hide();
			$('#User_barangay_id').closest('.row').hide();
		}
	});

	$('#User_province_id').change(function() {
		if ($(this).val()) {
			$('#User_city_id').closest('.row').show();
		} else {
			$('#User_city_id').closest('.row').hide();
			$('#User_barangay_id').closest('.row').hide();
		}
	});

	$('#User_city_id').change(function() {
		if ($(this).val()) {
			$('#User_barangay_id').closest('.row').show();
		} else {
			$('#User_barangay_id').closest('.row').hide();
		}
	});
});
");

?>
