<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">
    <?php $form = ActiveForm::begin(); ?>

    <?php
        if($this->context->route == 'site/create'){
            echo $form->field($model, 'text')->textInput(['maxlength' => true]);
        }

        if($this->context->route == 'site/update'){
            echo $form->field($model, 'isIncorrect')->textInput();
        }
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
