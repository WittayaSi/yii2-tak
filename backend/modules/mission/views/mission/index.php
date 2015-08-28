<?php

use yii\helpers\Html;
use yii\grid\GridView;
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
