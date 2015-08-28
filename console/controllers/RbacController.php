<?php

//RbaController.php
//how to call :: yii controller/action

namespace console\controllers;

use yii\console\Controller;
use Yii;

class RbacController extends Controller {

    public function actionHello() {
        echo 'Hello Console';
    }

    public function actionCreatePermission() {
        //call yii rba/create-permission
        $auth = Yii::$app->authManager;

        //mission
        $mission_index = $auth->createPermission('mission/mission/index');
        $mission_index->description = 'รายการภารกิจ';
        $auth->add($mission_index);

        $mission_create = $auth->createPermission('mission/mission/create');
        $mission_create->description = 'เพิ่มภารกิจ';
        $auth->add($mission_create);

        $mission_update = $auth->createPermission('mission/mission/update');
        $mission_update->description = 'แก้ไขภารกิจ';
        $auth->add($mission_update);

        $mission_view = $auth->createPermission('mission/mission/view');
        $mission_view->description = 'รายละเอียดภารกิจ';
        $auth->add($mission_view);

        $mission_delete = $auth->createPermission('mission/mission/delete');
        $mission_delete->description = 'ลบภารกิจ';
        $auth->add($mission_delete);

        //mission report

        $mission_report_index = $auth->createPermission('mission/report/index');
        $mission_report_index->description = 'รายงาน';
        $auth->add($mission_report_index);

        //personal
        $personal_index = $auth->createPermission('personal/personal/index');
        $personal_index->description = 'รายการบุคลากร';
        $auth->add($personal_index);

        $personal_create = $auth->createPermission('personal/personal/create');
        $personal_create->description = 'เพิ่มบุคลากร';
        $auth->add($personal_create);

        $personal_update = $auth->createPermission('personal/personal/update');
        $personal_update->description = 'แก้ไขบุคลากร';
        $auth->add($personal_update);

        $personal_view = $auth->createPermission('personal/personal/view');
        $personal_view->description = 'รายละเอียดบุคลากร';
        $auth->add($personal_view);

        $personal_delete = $auth->createPermission('personal/personal/delete');
        $personal_delete->description = 'ลบบุคลากร';
        $auth->add($personal_delete);

        //department
        $department_index = $auth->createPermission('setting/department/index');
        $department_index->description = 'รายการฝ่าย';
        $auth->add($department_index);

        $department_create = $auth->createPermission('setting/department/create');
        $department_create->description = 'เพิ่มฝ่าย';
        $auth->add($department_create);

        $department_update = $auth->createPermission('setting/department/update');
        $department_update->description = 'แก้ไขฝ่าย';
        $auth->add($department_update);

        $department_view = $auth->createPermission('setting/department/view');
        $department_view->description = 'รายละเอียดฝ่าย';
        $auth->add($department_view);

        $department_delete = $auth->createPermission('setting/department/delete');
        $department_delete->description = 'ลบฝ่าย';
        $auth->add($department_delete);

        echo 'create permission success!!';
    }

    public function actionCreateRole() {
        $auth = Yii::$app->authManager;

        //mission
        $mission_index = $auth->createPermission('mission/mission/index');
        $mission_create = $auth->createPermission('mission/mission/create');
        $mission_update = $auth->createPermission('mission/mission/update');
        $mission_view = $auth->createPermission('mission/mission/view');
        $mission_delete = $auth->createPermission('mission/mission/delete');

        //personal
        $personal_index = $auth->createPermission('personal/personal/index');
        $personal_create = $auth->createPermission('personal/personal/create');
        $personal_update = $auth->createPermission('personal/personal/update');
        $personal_view = $auth->createPermission('personal/personal/view');
        $personal_delete = $auth->createPermission('personal/personal/delete');

        //department
        $department_index = $auth->createPermission('setting/department/index');
        $department_create = $auth->createPermission('setting/department/create');
        $department_update = $auth->createPermission('setting/department/update');
        $department_view = $auth->createPermission('setting/department/view');
        $department_delete = $auth->createPermission('setting/department/delete');

        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $mission_index);
        $auth->addChild($user, $mission_view);
        $auth->addChild($user, $personal_index);
        $auth->addChild($user, $personal_view);
        $auth->addChild($user, $department_index);
        $auth->addChild($user, $department_view);




        $staff = $auth->createRole('staff');
        $auth->add($staff);
        $auth->addChild($staff, $user);
        $auth->addChild($staff, $mission_create);
        //$auth->addChild($staff, $mission_update);
        $auth->addChild($staff, $personal_create);
        $auth->addChild($staff, $personal_update);
        $auth->addChild($staff, $department_create);
        $auth->addChild($staff, $department_update);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $staff);
        $auth->addChild($admin, $mission_delete);
        $auth->addChild($admin, $personal_delete);
        $auth->addChild($admin, $department_delete);

        echo 'Create Role Success !!';
    }

    public function actionAssignment() {

        $auth = Yii::$app->authManager;

        $user = $auth->createRole('user');
        $staff = $auth->createRole('staff');
        $admin = $auth->createRole('admin');

        $auth->assign($user, 26);
        $auth->assign($staff, 25);
        $auth->assign($admin, 1);
        $auth->assign($admin, 24);

        echo 'User Assign Success !! ';
    }

    public function actionCreateRule() {
//เรียกใช้งาน yii rbac/create-rule
        $auth = Yii::$app->authManager;
// add the rule
        $rule = new \common\components\StaffRule;
        $auth->add($rule);
// add the "updateOwnPost" permission and associate the rule with it.
        $updateOwnPost = $auth->createPermission('updateOwnPost');
        $updateOwnPost->description = 'ปรับปรุงข้อมูลการโพสของตัวเอง';
        $updateOwnPost->ruleName = $rule->name;
        $auth->add($updateOwnPost);
        $mission_update = $auth->createPermission('mission/mission/update');

// "updateOwnPost" will be used from "updatePost"
        $auth->addChild($updateOwnPost, $mission_update);
// allow "staff" to update their own posts
        $staff = $auth->createPermission('staff');
        $auth->addChild($staff, $updateOwnPost);
        echo 'Generate UpdateOwnPost Success!';
    }

}
