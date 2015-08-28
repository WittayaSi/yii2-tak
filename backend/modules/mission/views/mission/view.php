<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\mission\models\Mission */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Missions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info box-solid">
    <div class="box-header with-border">
        <center><h3><?= yii\helpers\Html::encode($this->title); ?></h3></center>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute' => 'personal_user_id',
                    'value' => $model->personal->firstname . ' ' . $model->personal->lastname
                ],
                'title',
                'description:ntext',
                'date_start',
                'date_end',
                'created_at',
                'updated_at',
                [
                    'attribute' => 'user_id',
                    'value' => $model->personalUser->firstname . ' ' . $model->personalUser->lastname
                ],
            ],
        ])
        ?>
    </div>
</div>
