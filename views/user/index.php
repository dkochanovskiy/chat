<?php

use app\models\User;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [
            'username',
            [
                'attribute' => 'role',
                'value' => function($data){
                    if($data->role == 1){
                        return 'admin';
                    }
                    if($data->role == 2){
                        return 'user';
                    }
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Change role',
                'headerOptions' => ['width' => '80'],
                'template' => '{update}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
