<?php

use backend\widgets\MetronicModal;
use common\models\InfrastructureCategory;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\InfrastructureObject */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $infrastructureCategory array */

$__params = require __DIR__ .'/__params.php';

$this->title = 'Категории';
$this->params['breadcrumbs'][] = ['label' => 'Инфраструктура'];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['infrastructure-category/index']];

$columns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'attribute' => 'name_ru',
        'format' => 'raw',
        'value' => function($model) {
            return Html::a($model->name_ru, ['update', 'id' => $model->id]);
        }
    ],
    [
        'attribute' => 'name_ua',
        'format' => 'raw',
        'value' => function($model) {
            return Html::a($model->name_ua, ['update', 'id' => $model->id]);
        }
    ],
    [
        'attribute' => 'sort_order',
        'format' => 'raw',
        'label' => 'Порядок вывода',
        'value' => function($model) {
            /** @var $model \common\models\Document */
            return $model->sort_order;
        }
    ],
    [
        'class' => '\kartik\grid\BooleanColumn',
        'attribute' => 'status',
        'label' => 'Статус',
        'trueLabel' => InfrastructureCategory::STATUS_ENABLE,
        'falseLabel' => InfrastructureCategory::STATUS_DISABLE,
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{update} {delete}',
        'header' => 'Действия',
        'buttons' => [
            'delete' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                    'title' => 'Delete',
                    'data-pjax' => 0,
                    'data-confirm' => 'Вы уверены что хотите удалить эту запись?',
                    'data-method' => 'post'
                ]);
            },
        ],
        'urlCreator' => function($action, $model, $key, $index) {
            switch($action) {
                case 'view':
                    /** TODO - link to frontend */
                    return \yii\helpers\Url::to(['view', 'id' => $model->id]);
                    break;
                case 'delete':
                    return \yii\helpers\Url::to(['delete', 'id' => $model->id]);
                    break;
                case 'update':
                    return \yii\helpers\Url::to(['update', 'id' => $model->id]);
                    break;
            }
        },
    ],
];

$gridOptions = [
    'id' => $__params['id'],
    'dataProvider' => $dataProvider,
    'columns' => $columns,

    'responsive' => true,
    'striped' => true,
    'hover' => true,
    'pjax' => false,
    'persistResize' => false,
    'pjaxSettings' => [
        'neverTimeout' => true,
    ],
    'floatHeader' => true,
    'floatHeaderOptions' => [
        'position' => 'auto',
    ],

    'summary' => false,
    'krajeeDialogSettings' => [
        'options' => [
            'title' => ' Подтверждение',
            'btnOKClass' => 'btn-danger',
            'btnOKLabel' => 'Удалить',
            'btnCancelLabel' => 'Отменить'
        ]
    ]
];

$gridOptions = array_merge($gridOptions, [
    'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<i class="glyphicon glyphicon-book"></i> '. $__params['items'],
    ],
    'toolbar'=> [
        ['content'=>
            Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['data-pjax' => 0, 'class' => 'btn btn-primary', 'title' => $__params['create']]) .
            Html::button('<i class="glyphicon glyphicon-filter"></i>', ['type'=>'button', 'title' => Yii::t('app', 'Filter'), 'class' => 'btn btn-info', 'data-toggle' => 'modal', 'data-target' => '#search-filter']) . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 0 , 'class' => 'btn btn-default', 'title' => Yii::t('app', 'Reset filters')])
        ],
        '{toggleData}',
    ],
]);
?>

<!-- MODALS -->
<?php MetronicModal::begin([
    'header' => '<span class="h3">Фильтр по параметрам</span>',
    'id' => 'search-filter',
])?>
<?= $this->render('_search', [
    'model' => $searchModel,
]) ?>
<?php MetronicModal::end()?>
<!-- END MODALS -->

<?= GridView::widget($gridOptions); ?>
