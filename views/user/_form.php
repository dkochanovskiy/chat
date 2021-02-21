<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <div class="col-md-12">
        <div>Role 1 - admin</div>
        <div>Role 2 - user</div><br>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-2">
        <?php
            echo $form->field($model, 'role')->dropDownList([
                '1' => 'Admin',
                '2' => 'User'
            ]);
        ?>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Cancel', ['/user'], ['class' => 'btn btn-danger']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
