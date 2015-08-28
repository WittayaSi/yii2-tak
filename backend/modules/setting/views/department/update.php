<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\Department */

$this->title = 'Update Department: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box box-info box-solid">
    <div class="box-header with-border">
        <center><h3><?= yii\helpers\Html::encode($this->title); ?></h3></center>
    </div>
    <div class="box-body">

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>
