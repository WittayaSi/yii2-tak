<?php
$this->title = "ปฏิทินการเดินทางไปราชการ";

use yii2fullcalendar\yii2fullcalendar;
use yii\helpers\Url;
?>
<div class="box box-info box-solid">
    <div class="box-header with-border">
        <center><h3><?= yii\helpers\Html::encode($this->title); ?></h3></center>
    </div>
    <div class="box-body">
        <?=
        yii2fullcalendar::widget([
            'options' => [
                'lang' => 'th',
            //... more options to be defined here!
            ],
            'header' => [
                'left' => 'prev,next today',
                'center' => 'title',
                'right' => 'month,agendaWeek,agendaDay'
            ],
            'clientOptions' => [
                'timeFormat' => 'H:mm'
            ],
            'ajaxEvents' => Url::to(['/mission/default/jsoncalendar'])
        ]);
        ?>
    </div>
</div>

