<?php
//Bmi

namespace frontend\models;

use yii\base\Model;

class Bmi extends Model{
    public  $weight = 40;
    public  $hight = 120;
    
    public function rules(){
        return[
            [['weight','hight'],'required'],
            [['weight','hight'],'integer'],
            [['hight'],'compare','compareValue' => 0, 'operator' => '>']
        ];
    }
    
    public function attributeLabels() {
        return [
            'weight' => 'น้ำหนัก',
            'hight' => 'ส่วนสูง',
        ];
    }
}
