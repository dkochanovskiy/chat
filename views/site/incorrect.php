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

    <?php
    Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
    ?>

</div>
