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
?>
<div class="mission-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mission', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
