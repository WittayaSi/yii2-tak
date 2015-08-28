<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\modules\setting\models\Department;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\personal\models\PersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บุคลากร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info box-solid">
    <div class="box-header with-border">
        <center><h3><?= yii\helpers\Html::encode($this->title); ?></h3></center>
    </div>
    <div class="box-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('เพิ่มบุคลากร', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'username',
                    'value' => function($model) {
                        return $model->user->username;
                    }
                ],
                [
                    'attribute' => 'email',
                    'value' => function($model) {
                        return $model->user->email;
                    }
                ],
                [
                    'format' => 'html',
                    'attribute' => 'department_id',
                    'value' => function($model) {
                        return $model->department->department;
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'department_id', ArrayHelper::map(Department::find()->all(), 'id', 'department'), ['class' => 'form-control',
                        'prompt' => 'เลือกสังกัด']),
                ],
                'firstname',
                'lastname',
                'address:ntext',
                // 'tel',
                // 'color',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
    </div>
</div>
