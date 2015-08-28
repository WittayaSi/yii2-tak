<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\modules\personal\models\Personal;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\mission\models\MissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Missions';
$this->params['breadcrumbs'][] = $this->title;
echo "<br>";
?>
<div class="box box-info box-solid">
    <div class="box-header with-border">
        <center><h4><?= yii\helpers\Html::encode($this->title); ?></h4></center>
        <div class="box-tools pull-right">
            <p>
            <h4><?= Html::a('เพิ่มภารกิจ', ['create'], ['class' => 'btn btn-info']) ?></h4>
            </p>
        </div>
    </div>
    <div class="box-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'pjaxSettings' => [
                'neverTimeout' => true,
                'beforeGrid' => 'My fancy content before.',
                'afterGrid' => 'My fancy content after.',
            ],
            'responsive' => true,
            'hover' => true,
            'panel' => [
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Countries</h3>',
                'type' => 'success',
                'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Create Country', ['create'], ['class' => 'btn btn-success']),
                'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
                'footer' => false
            ],
            'toolbar' => [
                [
                    'content' =>
                    Html::button('<i class="glyphicon glyphicon-plus"></i>', [
                        'type' => 'button',
                        'title' => 'test',
                        'class' => 'btn btn-success'
                    ]) . ' ' .
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], [
                        'class' => 'btn btn-default',
                        'title' => 'test'
                    ]),
                ],
                '{export}',
                '{toggleData}'
            ],
            'toggleDataContainer' => ['class' => 'btn-group-sm'],
            'exportContainer' => ['class' => 'btn-group-sm'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'personal_user_id',
                    'value' => function($model) {
                        return $model->personal->firstname . ' ' . $model->personal->lastname;
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'personal_user_id', ArrayHelper::map(Personal::find()->all(), 'user_id', function($model) {
                                        return $model->firstname . ' ' . $model->lastname;
                                    }), [
                        'class' => 'form-control'
                            ]
                    ),
                ],
                [
                    'format' => 'html',
                    'attribute' => 'title',
                    'value' => function($model) {
                        return Html::a($model->title, ['mission/view', 'id' => $model->id]);
                    }
                        ],
                        //'description:ntext',
                        'date_start',
                        'date_end',
                        // 'created_at',
                        // 'updated_at',
                        [
                            'attribute' => 'user_id',
                            'value' => function($model) {
                                return $model->personalUser->firstname . ' ' . $model->personalUser->lastname;
                            }
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>

    </div>
</div>
