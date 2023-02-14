<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Teg $model */

$this->title = 'Update Teg: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tegs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="teg-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
