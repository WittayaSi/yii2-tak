<?php
/* @var $this yii\web\View */

use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;

$this->title = 'รายงานภารกิจประจำปี';

?>
<h1>Mission Report</h1>

<div class="box box-info box-solid">
    <div class="box-header">
        <h4><?= Html::encode($this->title)?></h4>
    </div>
    <div class="box-body">
        <?=
        Highcharts::widget([
            'options' => [
                'title' => ['text' => 'สรุปภารกิจ'],
                'xAxis' => [
                    'categories' => ['จำนวน'],
                ],
                'credits' => [
                    'enabled' => false,
                ],
                'yAxis' => [
                    'title' => ['text' => 'จำนวน'],
                ],
                'series' =>  $graph,
            ]
        ])
        ?>
</div>
</div>
<div class="box box-info box-solid">
    <div class="box-header">
        <h4>สรุปแบบตาราง</h4>
    </div>
    <div class="box-body">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => 'fullname',
                    'label' => 'ชื่อ - สกุล'
                ],
                [
                    'attribute' => 'mid',
                    'label' => 'จำนวนครั้ง ในรอบปี'
                ],
            ]
        ])
        ?>
    </div>
</div>
    
