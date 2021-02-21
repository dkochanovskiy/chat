<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Incorrect messages';
?>
<div class="message-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'tableOptions' => [
            'class' => 'table table-bordered'
        ],
        'rowOptions'=>function ($data) {
            if($data->user->role == 1){
                return [
                    'class' => 'warning'
                ];
            }
        },
        'columns' => [
            [
                'attribute'=>'user_id',
                'label'=>'Author',
                'content'=>function($data){
                    return $data->user->username;
                },
            ],
            'text',
            [
                'attribute'=>'create',
                'headerOptions' => ['width' => '100'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Mark is correct',
                'headerOptions' => ['width' => '80'],
                'template' => '{update}',
            ],
        ],
    ]);
    Pjax::end();
    ?>

</div>
