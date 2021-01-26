<?php

namespace frontend\widgets;

use frontend\models\InfrastructureCategory;
use frontend\models\InfrastructureObject;
use Yii;
use yii\base\Widget;

class InfrastructureWidget extends Widget
{
    /**
     * @return string
     */
    public function run()
    {
        $infrastructureCategoryModels = InfrastructureCategory::find()
            ->where(['status' => InfrastructureCategory::STATUS_ENABLE])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();

        return $this->render('infrastructure/view', [
            'infrastructureCategoryModels' => $infrastructureCategoryModels,
        ]);
    }
}