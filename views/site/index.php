<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messages';
?>
<div class="message-index">

    <?php
    if (!Yii::$app->user->isGuest) {
        echo '<p>';
        echo Html::a('Create Message', ['site/create'], ['class' => 'btn btn-success']);
        echo '</p>';

        Pjax::begin();
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'text',
                'isIncorrect',
                'create',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Действия',
                    'headerOptions' => ['width' => '80'],
                    'template' => '{update}',
                ],
            ],
        ]);
        Pjax::end();
    } else {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'user_id',
                'text',
                'create',
            ],
        ]);
    }
    ?>
</div>
