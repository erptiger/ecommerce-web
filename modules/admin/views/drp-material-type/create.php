<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DrpMaterialType */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Drp Material Type',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Drp Material Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drp-material-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
