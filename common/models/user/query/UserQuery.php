<?php

namespace common\models\user\query;

use common\models\user\User;
use yii\db\ActiveQuery;

/**
 * Class UserQuery
 * @package common\models\User\query
 */
class UserQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function notDeleted()
    {
        $this->andWhere(['!=', 'status', User::STATUS_DELETED]);
        return $this;
    }

    /**
     * @return $this
     */
    public function active()
    {
        $this->andWhere(['status' => User::STATUS_ACTIVE]);
        return $this;
    }
}
