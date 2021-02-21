<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\Message */
/* @var $searchModel app\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messages';
?>
<div class="message-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php

    if (!Yii::$app->user->isGuest) {
        echo '<p>';
        echo Html::a('Create Message', ['site/create'], ['class' => 'btn btn-success']);
        echo '</p>';
    }
    if(Yii::$app->user->identity->role == 1){
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
                    'header' => 'Mark is incorrect',
                    'template' => '{update}',
                ],
            ],
        ]);
        Pjax::end();
    } else {
        echo GridView::widget([
            'dataProvider' => $dataProviderUser,
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
            ],
        ]);
    }
    ?>
</div>
