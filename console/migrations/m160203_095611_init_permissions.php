<?php

use yii\db\Schema;
use common\rbac\Migration;

class m160203_095611_init_permissions extends Migration
{
    public $db = 'db';
    
    public function up()
    {
        $managerRole = $this->auth->getRole(\common\models\user\User::ROLE_MANAGER);

        $loginToBackend = $this->auth->createPermission('loginToBackend');
        $this->auth->add($loginToBackend);
        $this->auth->addChild($managerRole, $loginToBackend);
    }

    public function down()
    {
        $this->auth->remove($this->auth->getPermission('loginToBackend'));
    }
}
