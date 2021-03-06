<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	$model->username,
);
?>
<h1><?php echo UserModule::t('View User').' "'.$model->username.'"'; ?></h1>

<?php 
// echo $this->renderPartial('_menu', array(
		// 'list'=> array(
			// CHtml::link(UserModule::t('Create User'),array('create')),
			// CHtml::link(UserModule::t('Update User'),array('update','id'=>$model->id)),
			// CHtml::linkButton(UserModule::t('Delete User'),array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
		// ),
	// )); 
	
	$this->menu=array(
	array('label'=>UserModule::t('Manage User'),'url'=>array('/user/admin'), 'visible'=>UserModule::isAdmin()),
	array('label'=>UserModule::t('Create User'),'url'=>array('create')),
	array('label'=>UserModule::t('Update User'),'url'=>array('update', 'id'=>$model->id)),
	array('label'=>UserModule::t('Delete User'),'url'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
	array('label'=>UserModule::t('Profile'),'url'=>array('/user/profile')),
	array('label'=>UserModule::t('Edit'),'url'=>array('edit')),
	array('label'=>UserModule::t('Change password'),'url'=>array('changepassword')),
);


	$attributes = array(
		'id',
		'username',
	);
	
	$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
	if ($profileFields) {
		foreach($profileFields as $field) {
			array_push($attributes,array(
					'label' => UserModule::t($field->title),
					'name' => $field->varname,
					'type'=>'raw',
					'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
				));
		}
	}
	
	array_push($attributes,
		'password',
		'email',
		'activkey',
		array(
			'name' => 'createtime',
			'value' => date("d.m.Y H:i:s",$model->createtime),
		),
		array(
			'name' => 'lastvisit',
			'value' => (($model->lastvisit)?date("d.m.Y H:i:s",$model->lastvisit):UserModule::t("Not visited")),
		),
		array(
			'name' => 'superuser',
			'value' => User::itemAlias("AdminStatus",$model->superuser),
		),
		array(
			'name' => 'status',
			'value' => User::itemAlias("UserStatus",$model->status),
		)
	);
	
	$this->widget('ext.bootstrap.widgets.BootDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));
	

?>
