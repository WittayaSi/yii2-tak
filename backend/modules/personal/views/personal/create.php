<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\personal\models\Personal */

$this->title = 'เพิ่มบุคลากร';
$this->params['breadcrumbs'][] = ['label' => 'บุคลากร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info box-solid">
    <div class="box-header with-border">
        <center><h3><?= yii\helpers\Html::encode($this->title); ?></h3></center>
    </div>
    <div class="box-body">

        <?=
        $this->render('_form', [
            'model' => $model,
            'user' => $user,
        ])
        ?>
    </div>
</div>
