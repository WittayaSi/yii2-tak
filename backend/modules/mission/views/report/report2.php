<?php

use miloschuman\highcharts\Highcharts;

$this->title = 'report each month';
?>


<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
<?php
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'รายงานจำนวนภารกิจแบ่งตามบุคคล'],
        'xAxis' => [
            'categories' => ['ม.ค.',
                'ก.พ.',
                'มี.ค.',
                'เม.ย.',
                'พ.ค.',
                'มิ.ย.',
                'ก.ค.',
                'ส.ค.',
                'ก.ย.',
                'ต.ค.',
                'พ.ย.',
                'ธ.ค.']
        ],
        'yAxis' => [
            'title' => ['text' => 'จำนวน']
        ],
        'series' => $data
    ]
]);
?>
