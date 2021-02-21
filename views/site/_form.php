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
            echo $form->field($model, 'text')->textarea(['rows' => 10]);
        }

        if($this->context->route == 'site/update'){
            echo '<div class="col-md-12">';
            echo '<div>Correct - 0</div>';
            echo '<div>Incorrect - 1</div><br>';
            echo '</div>';
            echo '<div class="form-group">';
            echo '<div class="row">';
            echo '<div class="col-md-2">';

            echo $form->field($model, 'isIncorrect')->dropDownList([
                '0' => 'Correct',
                '1' => 'Incorrect'
            ])->label('Mark');

            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?php
            echo Html::a('Cancel', ['/site'], ['class' => 'btn btn-danger']);
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
