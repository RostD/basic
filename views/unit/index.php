<?php
/** @var \app\models\Unit $unit */
use yii\widgets\ActiveForm;

$form = ActiveForm::begin();
echo $form->field($unit,'name');
echo $form->field($unit,'full_name');
echo \yii\helpers\Html::submitButton('Send');
ActiveForm::end();