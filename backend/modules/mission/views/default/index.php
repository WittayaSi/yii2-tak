<?php

$this->title = "ภารกิจ";

use yii2fullcalendar\yii2fullcalendar;
use yii\helpers\Url;

?>

<?= yii2fullcalendar::widget([
      'options' => [
        'lang' => 'th',
        //... more options to be defined here!
      ],
      
      'ajaxEvents' => Url::to(['/mission/default/jsoncalendar'])
    ]);
?>